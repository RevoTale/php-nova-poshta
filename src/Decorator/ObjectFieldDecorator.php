<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use BladL\NovaPoshta\Exception\BadFieldValueException;

use function is_array;

final readonly class ObjectFieldDecorator
{
    public function __construct(
        private mixed $data
    ) {
    }
    /**
     * @throws BadFieldValueException
     */
    public function arrayObject(string $key): ObjectDecorator
    {
        $value = $this->data[$key];
        if (is_array($value)) {
            /**
             * @var array<string,mixed> $value
             */
            return new ObjectDecorator($value);
        }

        throw new BadFieldValueException('Field is not object');
    }
    public function float(): float
    {
        return (float)$this->scalar();
    }
    /**
     * @throws BadFieldValueException
     */
    public function integer(): int
    {
        return (int)$this->scalar();
    }
    /**
     * @return list<mixed>
     * @throws BadFieldValueException
     */
    public function list(): array
    {
        $list = $this->data;
        if (!is_array($list) || !array_is_list($list)) {
            throw new BadFieldValueException('Field is not list');
        }
        return $list;
    }


    public function bool(): bool
    {
        return (bool)$this->scalar();
    }

    public function string(): string
    {
        return (string)$this->scalar();
    }

    public function nullableScalar(): string|float|int|null|bool
    {
        $value = $this->data;
        if (!is_scalar($value) && null !== $value) {
            throw new BadFieldValueException('Field is not scalar');
        }
        return $value;
    }



    public function scalar(): string|float|int|bool
    {
        $value = $this->nullableScalar();
        if (null === $value) {
            throw new BadFieldValueException('Field is null');
        }
        return $value;
    }
}
