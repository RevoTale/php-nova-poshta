<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

final class CurlException extends QueryFailedException
{
    public function __construct(string $msg, int $code)
    {
        parent::__construct($msg, $code);
    }
}
