<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use UnexpectedValueException;

final class BadFieldValueException extends UnexpectedValueException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
