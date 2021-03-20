<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI;

use Awanturist\NovaPoshtaAPI\Exceptions\CurlException;
use Awanturist\NovaPoshtaAPI\Exceptions\ErrorResultException;
use Awanturist\NovaPoshtaAPI\Exceptions\JsonEncodeException;
use Awanturist\NovaPoshtaAPI\Exceptions\JsonParseException;
use Awanturist\NovaPoshtaAPI\Exceptions\QueryFailedException;
use Awanturist\NovaPoshtaAPI\Results\ResultContainer;
use JsonException;

abstract class APIFetcher
{
    public function __construct(private string $apiKey)
    {
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

        if ($err || $err_no) {
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
