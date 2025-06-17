<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta;

use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;
use Grisaia\NovaPoshta\Exception\QueryFailed\BadBodyException;
use Grisaia\NovaPoshta\Exception\QueryFailed\ErrorResultException;
use Grisaia\NovaPoshta\Exception\QueryFailed\JsonParseException;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use JsonException;
use Psr\Log\LoggerInterface;

use function is_array;

class ResponseParser
{
    public function __construct(

        private ?LoggerInterface $logger = null,
    ) {}

    /**
     * @throws BadBodyException
     * @phpstan-assert array<string,mixed> $resp
     */
    private function validateRespKeyed(mixed $resp): void
    {
        if (!is_array($resp)) {
            throw new BadBodyException('Response is not array');
        }

        foreach (array_keys($resp) as $key) {
            if (!is_string($key)) {
                throw new BadBodyException('Response key ' . $key . ' is not string');
            }
        }
    }

    /**
     * @throws BadBodyException
     * @param array<string|int,mixed> $errorCodes
     * @phpstan-assert array<string|int,string> $errorCodes
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
     * @param  array<string|int,mixed> $errors
     * @phpstan-assert array<string|int,string> $errors
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
     * @throws BadBodyException
     * @throws ErrorResultException
     * @throws JsonParseException
     */
    public function parse(string $result): ResponseContainer
    {

        try {
            $resp = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            $this->logger?->critical('Failed to decode response.', [
                'output' => $result,
                'jsonMsg' => $jsonException->getMessage(),
            ]);
            throw new JsonParseException($result, $jsonException);
        }

        $this->validateRespKeyed($resp);

        if (isset($resp['errors'])) {
            $errors = $resp['errors'];
            if (!is_array($errors)) {
                throw new BadBodyException('Errors is not array');
            }

            $errorCodes = $resp['errorCodes'];
            if (!is_array($errorCodes) || !array_is_list($errorCodes)) {
                throw new BadBodyException('Error codes is not list');
            }

            if ($errors !== []) {
                $this->logger?->error('NovaPoshta logical error', [
                    'errors' => $errors,
                ]);
                $this->validationErrorCodes($errorCodes);
                $this->validationErrors($errors);
                throw new ErrorResultException($errors, $errorCodes);
            }
        }

        return new ResponseContainer(new ObjectNormalizer($resp, exceptionFactory: new DefaultValidatorExceptionFactory()));
    }
}
