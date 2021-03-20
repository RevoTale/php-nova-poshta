<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use JetBrains\PhpStorm\Pure;
use Throwable;

final class JsonParseException extends QueryFailedException
{
    public function getPayload(): string
    {
        return $this->payload;
    }

    #[Pure]
    public function __construct(protected string $payload, Throwable $prev)
    {
        parent::__construct('АПИ вернуло некоректный формат даных', $prev);
    }
}
