<?php

declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\Exceptions\CurlException;
use BladL\NovaPoshta\Exceptions\ErrorResultException;
use BladL\NovaPoshta\Exceptions\JsonEncodeException;
use BladL\NovaPoshta\Exceptions\JsonParseException;
use BladL\NovaPoshta\Exceptions\QueryFailedException;
use BladL\NovaPoshta\Results\ResultContainer;
use DateTimeZone;
use Exception;
use function is_bool;
use JsonException;

abstract class APIFetcher
{
    private const TIMEZONE = 'Europe/Kiev';

    final public static function getTimeZone(): DateTimeZone
    {
        return new DateTimeZone(self::TIMEZONE);
    }

    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @throws CurlException
     * @throws QueryFailedException
     */
    protected function execute(string $model, string $method, array $params): ResultContainer
    {
        try {
            $payload = json_encode([
                'apiKey' => $this->apiKey,
                'modelName' => $model,
                'calledMethod' => $method,
                'methodProperties' => $params,
            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
            if (false === $payload) {
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
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => ['content-type: application/json'],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $err_no = curl_errno($curl);
        curl_close($curl);

        if ($err || $err_no || is_bool($response)) {
            throw new CurlException($err, $err_no);
        }
        try {
            $resp = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new JsonParseException($response, $e);
        }
        if (isset($resp['errors']) && !empty($resp['errors'])) {
            throw new ErrorResultException($resp['errors']);
        }

        return new ResultContainer($resp);
    }
}
