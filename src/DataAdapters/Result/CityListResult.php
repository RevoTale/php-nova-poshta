<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\CityListItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class CityListResult extends Result
{
    /**
     * @return list<CityListItem>
     */
    public function getCities(): array
    {
        return array_map(static fn(ObjectNormalizer $decorator) => new CityListItem($decorator)
            , $this->container->getDataAsObjectList());
    }
}
