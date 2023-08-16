<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception;

use Exception;

final class NoSeatsAmountException extends Exception
{
    public function __construct()
    {
        parent::__construct('No seats amount');
    }
}
