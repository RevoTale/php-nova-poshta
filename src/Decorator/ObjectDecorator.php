<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use Throwable;

/**
 * @template T of Throwable
 */
final readonly class ObjectDecorator
{
    /**
     * @param array<string,mixed> $data
     * @param BadFieldExceptionFactoryInterface<T> $exceptionFactory
     */
    public function __construct(
        private array                             $data,
        private BadFieldExceptionFactoryInterface $exceptionFactory
    ) {
    }

    /**
     * @return ValueDecorator<T>
     */
    public function field(string $key): ValueDecorator
    {
        if (!isset($this->data[$key])) {
            throw $this->exceptionFactory->createBadFieldException('Field key not exist');
        }
        return new ValueDecorator($this->data[$key], $this->exceptionFactory);
    }
    /**
     * @return ValueNullableDecorator<T>
     */
    public function nullableField(string $key): ValueNullableDecorator
    {
        return new ValueNullableDecorator($this->field($key));
    }

    /**
     * @return array<string,mixed>
     */
    public function getRaw(): array
    {
        return $this->data;
    }

    /**
     * @return BadFieldExceptionFactoryInterface<T>
     */
    public function getExceptionFactory(): BadFieldExceptionFactoryInterface
    {
        return $this->exceptionFactory;
    }

}
