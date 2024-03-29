<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

/**
 * @internal
 */
abstract class MethodProperties
{
    /**
     * @var array<string,string|float|int>
     */
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

    /**
     * @return array<string,string|float|int>
     */
    final public function getProperties(): array
    {
        return $this->data;
    }
}
