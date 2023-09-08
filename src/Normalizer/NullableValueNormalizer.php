<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Normalizer;

use Grisaia\NovaPoshta\Exception\Validator\BadValueExceptionInterface;

/**
 * @template T of BadValueExceptionInterface
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
     * @throws BadValueExceptionInterface
     */
    public function integer(): ?int
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (int)$value;
    }


    /**
     * @throws BadValueExceptionInterface
     */
    public function float(): ?float
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (float)$value;
    }


    /**
     * @throws BadValueExceptionInterface
     */
    public function bool(): ?bool
    {
        $yes = $this->data->nullableScalar();
        return '' === (string)$yes ? null : (bool)$yes;
    }


    /**
     * @throws BadValueExceptionInterface
     */
    public function string(): ?string
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (string)$value;
    }


}
