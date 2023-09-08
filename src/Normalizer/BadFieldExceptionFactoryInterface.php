<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

use Grisaia\NovaPoshta\Exception\Validator\BadValueExceptionInterface;

/**
 * @template T of BadValueExceptionInterface
 */
interface BadFieldExceptionFactoryInterface
{
    /**
     * @return T
     */
    public function createBadValueException(string $message, mixed $value, ?string $key = null): BadValueExceptionInterface;

}
