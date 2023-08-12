<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */
declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\Exceptions\QueryFailed\CurlException;
use BladL\NovaPoshta\Exceptions\QueryFailed\ErrorResultException;
use BladL\NovaPoshta\Exceptions\QueryFailed\JsonEncodeException;
use BladL\NovaPoshta\Exceptions\QueryFailed\JsonParseException;
use BladL\NovaPoshta\Exceptions\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\Results\ResultContainer;
use BladL\NovaPoshta\Services\Service;
use BladL\Time\TimeZone;
use Exception;
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
     * @throws QueryFailedException
     */
    public function fetch(string $model, string $method, array $params): ResultContainer
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
            if ($payload === false) {
                throw new JsonEncodeException(new Exception('Returned payload is false'));
            }
        } catch (JsonException $e) {
            throw new JsonEncodeException($e);
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.novaposhta.ua/v2.0/json/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => ['content-type: application/json'],
        ]);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        $err_no = curl_errno($curl);
        curl_close($curl);
        if ($err || $err_no || is_bool($result)) {
            $logger->alert('NovaPoshta cURl error', [
                'curlErr' => $err,
                'curlErrNo' => $err_no,
                'output' => $result,
            ]);
            throw new CurlException($err, $err_no);
        }
        $logger->debug('NovaPoshta service responded', ['output' => $result]);
        try {
            $resp = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $logger->critical('Failed to decode response.', [
                'output' => $result,
                'jsonMsg' => $e->getMessage(),
            ]);
            throw new JsonParseException($result, $e);
        }
        if (isset($resp['errors'])) {
            $errors = $resp['errors'];
            if (!empty($errors)) {
                $logger->error('NovaPoshta logical error', [
                    'errors' => $errors,
                ]);
                throw new ErrorResultException($resp['errors'], $resp['errorCodes']);
            }
        }

        return new ResultContainer($resp);
    }

    /**
     * @throws CurlException
     */
    public function fetchFile(string $path, int $timeout): string
    {
        $ch = curl_init(
            "https://my.novaposhta.ua/$path/apiKey/$this->apiKey"
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $result = curl_exec($ch);
        $err_no = curl_errno($ch);
        $err = curl_error($ch);
        $logger = $this->logger;
        if ($err || $err_no || is_bool($result)) {
            $logger->alert('NovaPoshta cURl file error', [
                'curlErr' => $err,
                'curlErrNo' => $err_no,
                'output' => $result,
            ]);
            throw new CurlException($err, $err_no);
        }
        curl_close($ch);
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
