<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

use Grisaia\NovaPoshta\DataAdapters\Entity;
use Grisaia\NovaPoshta\Exception\BadFieldValueException;
use Throwable;

use function is_array;

/**
 * @template T of Throwable
 */
final readonly class ValueNormalizer
{
    /**
     * @param mixed $data
     * @param BadFieldExceptionFactoryInterface<T> $exceptionFactory
     */
    public function __construct(
        private mixed                             $data,
        private BadFieldExceptionFactoryInterface $exceptionFactory
    ) {
    }

    /**
     * @return ObjectNormalizer<T>
     * @throws T
     */
    public function object(): ObjectNormalizer
    {
        $value = $this->data;
        if (is_array($value)) {
            /**
             * @var array<string,mixed> $value
             */
            return new ObjectNormalizer($value, exceptionFactory: $this->exceptionFactory);
        }

        throw  $this->exceptionFactory->createBadFieldException('Field is not object');
    }

    /**
     * @return  list<ObjectNormalizer<T>>
     * @throws T
     */
    public function objectList(): array
    {
        $data = $this->data;
        if (!is_array($data) || !array_is_list($data)) {
            throw  $this->exceptionFactory->createBadFieldException('Field is not list');
        }
        $list = [];
        foreach ($data as $item) {
            $list[] = new ObjectNormalizer($item, exceptionFactory: $this->exceptionFactory);
        }
        return $list;
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
     * @return list<ValueNormalizer<T>>
     * @throws T
     */
    public function list(): array
    {
        $list = [];
        $data = $this->data;
        if (!is_array($data) || !array_is_list($data)) {
            throw  $this->exceptionFactory->createBadFieldException('Field is not list');
        }
        foreach ($data as $datum) {
            $list[] = new ValueNormalizer($datum, exceptionFactory: $this->exceptionFactory);
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
            throw  $this->exceptionFactory->createBadFieldException('Field is not scalar');

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
            throw $this->exceptionFactory->createBadFieldException('Field is null');
        }
        return $value;
    }


}
