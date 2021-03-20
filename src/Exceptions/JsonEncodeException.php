<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use Throwable;

final class JsonEncodeException extends QueryFailedException
{
    public function __construct(Throwable $prev)
    {
        parent::__construct('Не удалось форматировать параметры в JSON', $prev->getCode(), $prev);
    }
}
