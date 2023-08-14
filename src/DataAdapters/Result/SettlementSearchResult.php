<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\SettlementSearchResource;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Decorator\ObjectDecorator;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return list<SettlementSearchResource>
     */
    public function getSettlements(): array
    {
        $addresses = (($this->container->getDataAsObjectList()[0]))->field('Addresses')->objectList();
        return array_map(
            static fn(ObjectDecorator $data) => new SettlementSearchResource($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (($this->container->getDataAsObjectList()[0]))->field('TotalCount')->integer();
    }
}
