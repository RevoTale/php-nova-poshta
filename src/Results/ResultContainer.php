<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

final class ResultContainer
{
    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function isSuccess(): bool
    {
        return $this->response['success'];
    }

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getInfo(): array
    {
        return $this->response['info'];
    }

    public function getData(): array
    {
        return $this->response['data'];
    }
}
