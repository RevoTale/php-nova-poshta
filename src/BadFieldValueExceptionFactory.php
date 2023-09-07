<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta;

use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Normalizer\BadFieldExceptionFactoryInterface;
use Grisaia\NovaPoshta\Exception\BadFieldValueException;

/**
 * @implements BadFieldExceptionFactoryInterface<BadFieldValueException>
 */
final class BadFieldValueExceptionFactory implements BadFieldExceptionFactoryInterface
{
    public function createBadFieldException(string $message, string $key): BadFieldValueException
    {
        return new BadFieldValueException($message, key: $key);
    }

    public function createBadValueException(string $message): BadValueException
    {
        return new BadValueException($message);
    }
}
