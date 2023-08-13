<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorators\Objects\City;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class CityFinderResult extends Result
{
    /**
     * @return City
     */
    public function getCities(): array
    {
        $data = $this->container->getData();
        if (!array_is_list($data)) {
            throw new \UnexpectedValueException('Data returned is not list');
        }
        return array_map(static fn (array $data) => new City($data), $data);
    }
}
