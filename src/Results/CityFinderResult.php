<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\City;


final class CityFinderResult extends Result
{
    /**
     * @return City[]
     */
    public function getCities(): array
    {
        return array_map(static fn (array $data) => new City($data), $this->container->getData());
    }
}
