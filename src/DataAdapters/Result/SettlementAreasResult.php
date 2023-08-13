<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\SettlementAreaResource;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SettlementAreasResult extends Result
{
    /**
     * @return list<SettlementAreaResource>
     */
    public function getAreas(): array
    {
        return $this->container->getListOfItems(SettlementAreaResource::class);
    }
}
