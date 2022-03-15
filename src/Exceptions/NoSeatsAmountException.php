<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Exception;

final class NoSeatsAmountException extends Exception
{
    public function __construct()
    {
        parent::__construct('Количество мест пустое');
    }
}
