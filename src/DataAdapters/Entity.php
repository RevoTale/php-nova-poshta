<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Decorator\ObjectFieldDecorator;
use BladL\NovaPoshta\Decorator\ObjectNullableFieldDecorator;

abstract readonly class Entity
{
    private ObjectDecorator $data;

    /**
     * @param array<string,mixed> $data
     */
    public function __construct(array $data)
    {
        $this->data = new ObjectDecorator($data);
    }

    public function getField(string $key): ObjectFieldDecorator
    {
        return $this->data->field($key);
    }
    public function getNullableField(string $key): ObjectNullableFieldDecorator
    {
        return $this->data->nullableField($key);
    }
}

