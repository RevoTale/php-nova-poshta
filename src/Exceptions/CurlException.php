<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

final class CurlException extends QueryFailedException
{
    public function __construct(string $msg, int $code)
    {
        parent::__construct($msg, $code);
    }
}
