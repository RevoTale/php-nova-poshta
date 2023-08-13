<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use BladL\NovaPoshta\Exception\BadFieldValueException;
use function is_array;

final readonly class ObjectDecorator
{
    /**
     * @param array<string,mixed> $data
     */
    public function __construct(
        private array $data
    ) {
    }

    /**
     * @throws BadFieldValueException
     */
    public function int(string $key): int
    {
        return (int)$this->getScalar($key);
    }

    /**
     * @throws BadFieldValueException
     * @return array<string,mixed>
     */
    public function arrayObject(string $key): array
    {
        $value = $this->data[$key];
        if (is_array($value)) {
            /**
             * @var array<string,mixed>$value
             */
            return $value;
        }

        throw new BadFieldValueException('Field is not object');
    }

    /**
     * @return list<mixed>
     * @throws BadFieldValueException
     */
    public function arrayList(string $key): array
    {
        $list = $this->data[$key];
        if (!is_array($list) || !array_is_list($list)) {
            throw new BadFieldValueException('Field is not list');
        }
        return $list;
    }


    public function bool(string $key): bool
    {
        return (bool)$this->getScalar($key);
    }

    public function string(string $key): string
    {
        return (string)$this->getScalar($key);
    }

    public function float(string $key): float
    {
        return (float)$this->getScalar($key);
    }

    public function nullOrString(string $key): ?string
    {
        $value = $this->getPrimitive($key);
        return '' === (string)$value ? null : (string)$value;
    }

    public function getPrimitive(string $key): string|float|int|null|bool
    {
        $value = $this->data[$key];
        if (!is_scalar($value) && null !== $value) {
            throw new BadFieldValueException('Field is not scalar');
        }
        return $value;
    }

    public function getScalar(string $key): string|float|int|bool
    {
        $value = $this->getPrimitive($key);
        if (null === $value) {
            throw new BadFieldValueException('Field is null');
        }
        return $value;
    }

    public function nullOrInt(string $key): ?int
    {
        $value = $this->getPrimitive($key);
        return '' === (string)$value ? null : (int)$value;
    }

    public function nullOrFloat(string $key): ?float
    {
        $value = $this->getPrimitive($key);
        return '' === (string)$value ? null : (float)$value;
    }

    public function nullOrBool(string $key): ?bool
    {
        $yes = $this->getPrimitive($key);
        return '' === (string)$yes ? null : (bool)$yes;
    }
}
