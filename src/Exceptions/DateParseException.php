<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

final class DateParseException extends Exception
{
    #[Pure]
     public function __construct(Exception $exception)
     {
         parent::__construct($exception->getMessage(), 0, $exception);
     }
}
