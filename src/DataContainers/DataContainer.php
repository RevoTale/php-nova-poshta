<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

abstract readonly class DataContainer
{
    protected readonly DataRepository $data;
    public function __construct(array $data)
    {
        $this->data = new DataRepository($data);
    }
}
