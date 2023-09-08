<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta;

use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Normalizer\BadFieldExceptionFactoryInterface;

/**
 * @implements BadFieldExceptionFactoryInterface<BadValueException>
 */
final class DefaultValidatorExceptionFactory implements BadFieldExceptionFactoryInterface
{
    public function createBadValueException(string $message, mixed $value, string|null $key = null): BadValueException
    {
        return new BadValueException($message, value: $value, key: $key);
    }

}
