<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use UnexpectedValueException;

final readonly class DefaultBadFieldExceptionFactory implements BadFieldExceptionFactoryInterface
{

    public function createBadFieldException(string $message): UnexpectedValueException
    {
        return new UnexpectedValueException($message);
    }
}
