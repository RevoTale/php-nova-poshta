<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

final readonly class ObjectDecorator
{
    /**
     * @param array<string,mixed> $data
     */
    public function __construct(
        private array                             $data,
        private BadFieldExceptionFactoryInterface $exceptionFactory = new DefaultBadFieldExceptionFactory(),
    ) {
    }

    public function field(string $key): ObjectFieldDecorator
    {
        if (!isset($this->data[$key])) {
            throw new $this->exceptionFactory->createBadFieldException('Field key not exist');
        }
        return new ObjectFieldDecorator($this->data[$key], $this->exceptionFactory);
    }


}
