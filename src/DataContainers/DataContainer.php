<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

abstract readonly class DataContainer
{
    protected DataRepository $data;

    /**
     * @param array<string,mixed> $data
     */
    public function __construct(array $data)
    {
        $this->data = new DataRepository($data);
    }
}
