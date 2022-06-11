<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

abstract class DataContainer
{
    protected readonly DataRepository $data;
    public function __construct(array $data)
    {
        $this->data = new DataRepository($data);
    }
}
