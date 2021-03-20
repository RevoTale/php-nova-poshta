<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

use Awanturist\NovaPoshtaAPI\DataContainers\City;

final class CityFinderResult extends Result
{
    /**
     * @return City[]
     */
    public function getCities(): array
    {
        return array_map(static fn (array $data) => new City($data), $this->container->getDataField());
    }
}
