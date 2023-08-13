<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;
use Throwable;

/**
 * @template T of Throwable
 */
final readonly class ObjectNullableFieldDecorator
{
    /**
     * @param ObjectFieldDecorator<T> $data
     */
    public function __construct(
        private ObjectFieldDecorator $data,
    ) {
    }

    /**
     * @throws T
     */
    public function integer(): ?int
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (int)$value;
    }

    /**
     * @throws T
     */
    public function float(): ?float
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (float)$value;
    }

    /**
     * @throws T
     */
    public function bool(): ?bool
    {
        $yes = $this->data->nullableScalar();
        return '' === (string)$yes ? null : (bool)$yes;
    }


    /**
     * @throws T
     */
    public function string(): ?string
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (string)$value;
    }


}
