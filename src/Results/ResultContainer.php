<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

final class ResultContainer
{
    public function __construct(private array $response)
    {
    }

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getDataField(string | int ...$keyTree): array
    {
        return $this->getField('data', ...$keyTree);
    }

    public function getField(string | int ...$keyTree): mixed
    {
        $data = $this->response;
        foreach ($keyTree as $key) {
            $data = $data[$key];
        }

        return $data;
    }
}
