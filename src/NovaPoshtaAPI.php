<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta;

use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;
use Grisaia\NovaPoshta\Exception\QueryFailed\CurlException;
use Grisaia\NovaPoshta\Exception\QueryFailed\JsonEncodeException;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\Services\Service;
use Grisaia\Time\TimeZone;
use JsonException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use stdClass;

use function is_bool;

/**
 * Entry class for all library services
 */
class NovaPoshtaAPI implements LoggerAwareInterface
{
    private LoggerInterface $logger;
    private const  TIME_ZONE = TimeZone::EuropeKyiv;

    final public static function getTimeZone(): TimeZone
    {
        return self::TIME_ZONE;
    }

    public function __construct(private readonly string $apiKey)
    {
        $this->logger = new NullLogger();
    }

    private int $timeout = 4;

    public function setTimeoutInSeconds(int $timout): void
    {
        $this->timeout = $timout;
    }

    /**
     * @param array<string,string|int|bool|float|array<string|int,mixed>|list<mixed>> $params
     * @throws QueryFailedException
     */
    public function fetch(string $model, string $method, array $params): ResponseContainer
    {
        $logger = $this->logger;
        try {
            $payload = json_encode([
                'apiKey' => $this->apiKey,
                'modelName' => $model,
                'calledMethod' => $method,
                'methodProperties' => empty($params) ? new stdClass() : $params,
            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
            $logger->info('Requested NovaPoshta service', compact('model', 'method', 'params'));
        } catch (JsonException $e) {
            throw new JsonEncodeException($e);
        }
        $request = new NovaPoshtaRequest(payload: $payload, logger: $logger, timeout: $this->timeout);
        return $request->handle();
    }

    /**
     * @throws CurlException
     */
    public function fetchFile(string $path, int $timeout): string
    {
        $curl = curl_init(
            "https://my.novaposhta.ua/$path/apiKey/$this->apiKey"
        );
        if (false === $curl) {
            throw new CurlException('Failed to initialize curl connectivity', 0);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        $result = curl_exec($curl);
        $errNo = curl_errno($curl);
        $err = curl_error($curl);
        $logger = $this->logger;
        if ($err || $errNo || is_bool($result)) {
            $logger->alert('NovaPoshta cURl file error', [
                'curlErr' => $err,
                'curlErrNo' => $errNo,
                'output' => $result,
            ]);
            throw new CurlException($err, $errNo);
        }
        curl_close($curl);
        return $result;
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }


    /**
     * @param class-string<T> $class
     * @return T
     *
     * @template T of Service
     */
    public function getService(string $class): Service
    {
        return new $class($this);
    }
}
