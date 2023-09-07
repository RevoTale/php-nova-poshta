<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

use Throwable;

/**
 * @template T of Throwable
 */
final readonly class ObjectNormalizer
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
     * @return ValueNormalizer<T>
     */
    public function field(string $key): ValueNormalizer
    {
        if (!isset($this->data[$key])) {
            throw $this->exceptionFactory->createBadFieldException('Field key not exist',key: $key);
        }
        return new ValueNormalizer($this->data[$key], $this->exceptionFactory);
    }
    /**
     * @return NullableValueNormalizer<T>
     */
    public function nullableField(string $key): NullableValueNormalizer
    {
        return new NullableValueNormalizer($this->field($key));
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
