<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Throwable;

final class JsonParseException extends QueryFailedException
{
    protected string $payload;

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function __construct(string $payload, Throwable $prev)
    {
        $this->payload = $payload;
        parent::__construct('АПИ вернуло некоректный формат даных', 0, $prev);
    }
}
