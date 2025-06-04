<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementRegionItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementRegionListResult extends Result
{
    /**
     * @return list<SettlementRegionItem>
     */
    public function getRegions(): array
    {
        return array_map(
            static fn (ObjectNormalizer $decorator): \Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementRegionItem => new SettlementRegionItem($decorator),
            $this->container->getDataAsObjectList()
        );
    }
}
