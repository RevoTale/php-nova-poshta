<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions\QueryFailed;

final class CurlException extends QueryFailedException
{
    public function __construct(string $msg, int $code)
    {
        parent::__construct($msg, $code);
    }
}
