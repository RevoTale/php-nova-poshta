<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

final class NoSeatsAmountException extends Exception
{
    #[Pure]
     public function __construct()
     {
         parent::__construct('Количество мест пустое');
     }
}
