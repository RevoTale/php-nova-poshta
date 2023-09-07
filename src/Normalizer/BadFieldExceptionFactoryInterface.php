<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

use Grisaia\NovaPoshta\Exception\BadFieldValueException;
use Grisaia\NovaPoshta\Exception\BadValueException;
use Throwable;

/**
 * @template T of Throwable
 */
interface BadFieldExceptionFactoryInterface
{
    public function createBadFieldException(string $message, string $key): BadFieldValueException;
    public function createBadValueException(string $message):BadValueException;

}
