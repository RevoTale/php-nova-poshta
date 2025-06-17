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
    private ResponseParser $responseParser;
    public function __construct(
        private string          $payload,
        private LoggerInterface $logger,
        private int             $timeout,
    ) {
        $this->responseParser = new ResponseParser(logger: $logger);
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

        return $this->responseParser->parse($result);
    }
}
