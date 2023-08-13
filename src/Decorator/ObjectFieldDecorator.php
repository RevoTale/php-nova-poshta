<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use BladL\NovaPoshta\Exception\BadFieldValueException;

use Throwable;
use function is_array;

/**
 * @template T of Throwable
 */
final readonly class ObjectFieldDecorator
{
    public function __construct(
        private mixed $data,
        private BadFieldExceptionFactoryInterface $exceptionFactory = new DefaultBadFieldExceptionFactory(),

    ) {
    }
    /**
     * @throws T
     */
    public function arrayObject(): ObjectDecorator
    {
        $value =$this->data;
        if (is_array($value)) {
            /**
             * @var array<string,mixed> $value
             */
            return new ObjectDecorator($value);
        }

        throw new $this->exceptionFactory->createBadFieldException('Field is not object');
    }

    /**
     * @throws T
     */
    public function float(): float
    {
        return (float)$this->scalar();
    }
    /**
     * @throws T
     */
    public function integer(): int
    {
        return (int)$this->scalar();
    }
    /**
     * @return list<mixed>
     * @throws T
     */
    public function list(): array
    {
        $list = $this->data;
        if (!is_array($list) || !array_is_list($list)) {
            throw new BadFieldValueException('Field is not list');
        }
        return $list;
    }

    /**
     * @throws T
     */
    public function bool(): bool
    {
        return (bool)$this->scalar();
    }
    /**
     * @throws T
     */
    public function string(): string
    {
        return (string)$this->scalar();
    }
    /**
     * @throws T
     */
    public function nullableScalar(): string|float|int|null|bool
    {
        $value = $this->data;
        if (!is_scalar($value) && null !== $value) {
            throw new BadFieldValueException('Field is not scalar');
        }
        return $value;
    }


    /**
     * @throws T
     */
    public function scalar(): string|float|int|bool
    {
        $value = $this->nullableScalar();
        if (null === $value) {
            throw new $this->exceptionFactory->createBadFieldException('Field is null');
        }
        return $value;
    }
}
