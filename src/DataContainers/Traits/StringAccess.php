<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait StringAccess
{
    abstract protected function getStr(string $key): string;
}
