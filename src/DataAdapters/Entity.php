<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters;

use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use Grisaia\NovaPoshta\Normalizer\ValueNormalizer;
use Grisaia\NovaPoshta\Normalizer\NullableValueNormalizer;
use Grisaia\NovaPoshta\Exception\BadValueException;

abstract readonly class Entity
{
    /**
     * @param ObjectNormalizer<BadValueException> $data
     */
    public function __construct(private ObjectNormalizer $data)
    {
    }

    /**
     * @return ValueNormalizer<BadValueException>
     */
    public function getField(string $key): ValueNormalizer
    {
        return $this->data->field($key);
    }

    /**
     * @return array<string,mixed>
     */
    public function getRaw(): array
    {
        return $this->data->getRaw();
    }
    /**
     * @return NullableValueNormalizer<BadValueException>
     */
    public function getNullableField(string $key): NullableValueNormalizer
    {
        return $this->data->nullableField($key);
    }
}
