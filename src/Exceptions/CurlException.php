<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use JetBrains\PhpStorm\Pure;

final class CurlException extends QueryFailedException
{
    #[Pure]
     public function __construct(string $msg, int $code)
     {
         parent::__construct($msg, $code);
     }
}
