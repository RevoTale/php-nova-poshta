<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Normalizer;

use Throwable;

/**
 * @template T of Throwable
 */
interface BadFieldExceptionFactoryInterface
{
    public function createBadFieldException(string $message): Throwable;
}
