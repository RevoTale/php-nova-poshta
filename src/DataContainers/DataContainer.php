<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\StringAccess;

/**
 * @internal
 */
abstract class DataContainer
{
    use StringAccess;

    private array $data;

    final public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function getInt(string $key): int
    {
        return $this->data[$key];
    }

    protected function getArray(string $key): array
    {
        return $this->data[$key];
    }

    protected function getForceBool(string $key): ?bool
    {
        return isset($this->data[$key]) ? (bool)$this->data[$key] : null;
    }

    protected function getBool(string $key): bool
    {
        return $this->data[$key];
    }

    protected function getStr(string $key): string
    {
        return $this->data[$key];
    }
}
