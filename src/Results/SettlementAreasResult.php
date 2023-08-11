<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementAreaItem;

final readonly class SettlementAreasResult extends Result
{
    /**
     * @return list<SettlementAreaItem>
     */
    public function getAreas(): array
    {
        return $this->container->getListOfItems(SettlementAreaItem::class);
    }
}
