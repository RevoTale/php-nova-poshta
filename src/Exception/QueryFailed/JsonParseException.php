<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception\QueryFailed;

use Throwable;

final class JsonParseException extends QueryFailedException
{
    private string $payload;

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function __construct(string $payload, Throwable $prev)
    {
        $this->payload = $payload;
        parent::__construct('АПИ вернуло некорректный формат данных', 0, $prev);
    }
}
