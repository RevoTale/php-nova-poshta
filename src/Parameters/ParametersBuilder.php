<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

/**
 * @internal
 */
abstract class ParametersBuilder
{
    private array $data = [];

    protected function setStr(string $key, string $value): void
    {
        $this->data[$key] = $value;
    }

    protected function setInt(string $key, int $value): void
    {
        $this->data[$key] = $value;
    }

    protected function setBool(string $key, bool $value): void
    {
        $this->data[$key] = $value ? '1' : '0';
    }

    final public function getProperties(): array
    {
        return $this->data;
    }
}
