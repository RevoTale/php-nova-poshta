<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\City;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class CityFinderResult extends Result
{
    /**
     * @return list<City>
     */
    public function getCities(): array
    {
        return array_map(static fn(ObjectNormalizer $decorator) => new City($decorator)
            , $this->container->getData()->objectList());
    }
}
