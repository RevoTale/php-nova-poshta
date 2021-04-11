<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

trait StringAccess
{
    abstract protected function getStr(string $key): string;
}
