<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\DataAdapters\Entities\SettlementStreet;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SearchSettlementResult extends Result
{
    /**
     * @return list<SettlementStreet>
     */
    public function getStreets(): array
    {
        $addresses = ($this->container->getDataAsObjectList()[0])->field('Addresses')->objectList();
        return array_map(
            static fn (ObjectDecorator $data) => new SettlementStreet($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (($this->container->getDataAsObjectList()[0]))->field('TotalCount')->integer();
    }
}
