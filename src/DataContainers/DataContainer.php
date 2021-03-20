<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\DataContainers;

abstract class DataContainer
{
    public function __construct(protected array $data)
    {
    }
}
