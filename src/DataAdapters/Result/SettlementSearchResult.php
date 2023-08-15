<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\SettlementSearchItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return list<SettlementSearchItem>
     */
    public function getSettlements(): array
    {
        $addresses = (($this->container->getDataAsObjectList()[0]))->field('Addresses')->objectList();
        return array_map(
            static fn(ObjectNormalizer $data) => new SettlementSearchItem($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (($this->container->getDataAsObjectList()[0]))->field('TotalCount')->integer();
    }
}
