<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\Decorator\ObjectDecorator;

abstract readonly class Entity
{
    protected ObjectDecorator $data;

    /**
     * @param array<string,mixed> $data
     */
    public function __construct(array $data)
    {
        $this->data = new ObjectDecorator($data);
    }
}
