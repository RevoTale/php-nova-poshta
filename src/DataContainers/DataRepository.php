<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

/**
 * @internal
 */
final class DataRepository
{
    public function __construct(
        private readonly array $data
    ) {
    }

    public function int(string $key): int
    {
        return (int)$this->data[$key];
    }

    public function array(string $key): array
    {
        return $this->data[$key];
    }


    public function bool(string $key): bool
    {
        return (bool)$this->data[$key];
    }

    public function string(string $key): string
    {
        return (string)$this->data[$key];
    }

    public function float(string $key): float
    {
        return (float)$this->data[$key];
    }

    public function nullOrString(string $key): ?string
    {
        $value = (string)$this->data[$key];
        return '' === $value ? null : $value;
    }

    public function nullOrInt(string $key): ?int
    {
        $value = (string)$this->data[$key];
        return '' === $value ? (int)$value : null;
    }

    public function nullOrFloat(string $key): ?float
    {
        $value = (string)$this->data[$key];
        return '' === $value ? null : (float)$value;
    }

    public function nullOrBool(string $key): ?bool
    {
        $yes = (string)$this->data[$key];
        return '' === $yes ? null : (bool)$yes;
    }
}
