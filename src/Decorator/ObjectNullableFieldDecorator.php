<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

final readonly class ObjectNullableFieldDecorator
{
    public function __construct(
        private ObjectFieldDecorator $data
    ) {
    }

    public function integer(): ?int
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (int)$value;
    }

    public function float(): ?float
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (float)$value;
    }

    public function bool(): ?bool
    {
        $yes = $this->data->nullableScalar();
        return '' === (string)$yes ? null : (bool)$yes;
    }


    public function string(): ?string
    {
        $value = $this->data->nullableScalar();
        return '' === (string)$value ? null : (string)$value;
    }


}
