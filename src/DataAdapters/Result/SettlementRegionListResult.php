<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\SettlementRegionItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementRegionListResult extends Result
{
    /**
     * @return list<SettlementRegionItem>
     */
    public function getRegions(): array
    {
        return array_map(
            static fn (ObjectNormalizer $decorator) => new SettlementRegionItem($decorator),
            $this->container->getDataAsObjectList()
        );
    }
}
