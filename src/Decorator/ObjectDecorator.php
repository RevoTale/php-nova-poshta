<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

use BladL\NovaPoshta\Exception\BadFieldValueException;

final readonly class ObjectDecorator
{
    /**
     * @param array<string,mixed> $data
     */
    public function __construct(
        private array $data
    ) {
    }

    public function getKey(string $key): ObjectFieldDecorator
    {
        if (!isset($this->data[$key])) {
            throw new BadFieldValueException('Field key not exist');
        }
        return new ObjectFieldDecorator($this->data[$key]);
    }


}
