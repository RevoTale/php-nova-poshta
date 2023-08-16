<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;
use Throwable;

/**
 * @template T of Throwable
 */
final readonly class NullableValueNormalizer
{
    /**
     * @param ValueNormalizer<T> $data
     */
    public function __construct(
        private ValueNormalizer $data,
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
