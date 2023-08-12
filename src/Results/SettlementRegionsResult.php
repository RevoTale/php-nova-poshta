<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementRegionItem;

final readonly class SettlementRegionsResult extends Result
{
    /**
     * @return list<SettlementRegionItem>
     */
    public function getRegions(): array
    {
        return $this->container->getListOfItems(SettlementRegionItem::class);
    }
}
