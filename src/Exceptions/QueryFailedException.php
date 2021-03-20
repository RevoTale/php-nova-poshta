<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

abstract class QueryFailedException extends Exception
{
    #[Pure]
     public function __construct(string $message, $code = 0, Throwable $previous = null)
     {
         parent::__construct($message, $code, $previous);
     }
}
