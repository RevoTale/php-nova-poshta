<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\SettlementRegionResource;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementRegionsResult extends Result
{
    /**
     * @return list<SettlementRegionResource>
     */
    public function getRegions(): array
    {
        return array_map(
            static fn (ObjectNormalizer $decorator) => new SettlementRegionResource($decorator),
            $this->container->getDataAsObjectList()
        );
    }
}
