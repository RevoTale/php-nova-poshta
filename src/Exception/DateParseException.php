<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exception;

use Exception;

final class DateParseException extends Exception
{
    public function __construct(Exception $exception)
    {
        parent::__construct($exception->getMessage(), 0, $exception);
    }
}
