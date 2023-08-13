<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\SettlementRegionResource;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SettlementRegionsResult extends Result
{
    /**
     * @return list<SettlementRegionResource>
     */
    public function getRegions(): array
    {
        return $this->container->getListOfItems(SettlementRegionResource::class);
    }
}
