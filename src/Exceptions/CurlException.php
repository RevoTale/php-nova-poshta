<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use JetBrains\PhpStorm\Pure;

final class CurlException extends QueryFailedException
{
    #[Pure]
 public function __construct(string $msg, int $code)
 {
     parent::__construct($msg, $code);
 }
}
