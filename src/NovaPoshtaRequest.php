<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta;

use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;
use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Exception\QueryFailed\BadBodyException;
use Grisaia\NovaPoshta\Exception\QueryFailed\CurlException;
use Grisaia\NovaPoshta\Exception\QueryFailed\ErrorResultException;
use Grisaia\NovaPoshta\Exception\QueryFailed\JsonParseException;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use JsonException;
use Psr\Log\LoggerInterface;

use function is_array;
use function is_bool;

/**
 * @internal
 */
final readonly class NovaPoshtaRequest
{
    public function __construct(
        private string          $payload,
        private LoggerInterface $logger,
        private int             $timeout
    ) {
    }

    /**
     * @return ObjectNormalizer<BadValueException>
     * @throws BadBodyException
     * @throws ErrorResultException
     * @throws JsonParseException
     */
    private function validateResponse(string $result): ObjectNormalizer
    {

        try {
            $resp = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $this->logger->critical('Failed to decode response.', [
                'output' => $result,
                'jsonMsg' => $e->getMessage(),
            ]);
            throw new JsonParseException($result, $e);
        }
        if (!is_array($resp)) {
            throw new BadBodyException('Response is not array');
        }
        if (isset($resp['errors'])) {
            $errors = $resp['errors'];
            if (!is_array($errors)) {
                throw new BadBodyException('Errors is not array');
            }
            $errorCodes = $resp['errorCodes'];
            if (!is_array($errorCodes) || !array_is_list($errorCodes)) {
                throw new BadBodyException('Error codes is not list');
            }
            if (!empty($errors)) {
                $this->logger->error('NovaPoshta logical error', [
                    'errors' => $errors,
                ]);
                $this->validationErrorCodes($errorCodes);
                $this->validationErrors($errors);
                throw new ErrorResultException($errors, $errorCodes);
            }
        }
        return new ObjectNormalizer($resp, exceptionFactory: new DefaultValidatorExceptionFactory());
    }

    /**
     * @throws BadBodyException
     * @var array<string|int,mixed> $errorCodes
     * @phpstan-assert array<string|int,string> $object
     */
    private function validationErrorCodes(array $errorCodes): void
    {
        foreach ($errorCodes as $code) {
            if (!is_string($code)) {
                throw new BadBodyException('Error code is not string');
            }
        }
    }
    /**
     * @throws BadBodyException
     * @var array<string|int,mixed> $errors
     * @phpstan-assert array<string|int,string> $object
     */
    private function validationErrors(array $errors): void
    {
        foreach ($errors as $error) {
            if (!is_string($error)) {
                throw new BadBodyException('Error not string');
            }
        }
    }

    /**
     * @throws QueryFailedException
     */
    public function handle(): ResponseContainer
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.novaposhta.ua/v2.0/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_POSTFIELDS => $this->payload,
            CURLOPT_HTTPHEADER => ['content-type: application/json'],
        ]);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        $errNo = curl_errno($curl);
        curl_close($curl);
        if ($err || $errNo || is_bool($result)) {
            $this->logger->alert('NovaPoshta cURl error', [
                'curlErr' => $err,
                'curlErrNo' => $errNo,
                'output' => $result,
            ]);
            throw new CurlException($err, $errNo);
        }
        $this->logger->debug('NovaPoshta service responded', ['output' => $result]);

        return new ResponseContainer($this->validateResponse($result));
    }
}
