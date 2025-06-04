<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\CityListItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class CityListResult extends Result
{
    /**
     * @return list<CityListItem>
     */
    public function getCities(): array
    {
        return array_map(static fn (ObjectNormalizer $decorator): \Grisaia\NovaPoshta\DataAdapters\Entities\Location\CityListItem => new CityListItem($decorator), $this->container->getDataAsObjectList());
    }
}
