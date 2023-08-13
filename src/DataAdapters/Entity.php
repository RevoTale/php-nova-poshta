<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Decorator\ValueDecorator;
use BladL\NovaPoshta\Decorator\ValueNullableDecorator;
use BladL\NovaPoshta\Exception\BadFieldValueException;

abstract readonly class Entity
{
    /**
     * @param ObjectDecorator<BadFieldValueException> $data
     */
    public function __construct(private ObjectDecorator $data)
    {
    }

    /**
     * @return ValueDecorator<BadFieldValueException>
     */
    public function getField(string $key): ValueDecorator
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
     * @return ValueNullableDecorator<BadFieldValueException>
     */
    public function getNullableField(string $key): ValueNullableDecorator
    {
        return $this->data->nullableField($key);
    }
}

