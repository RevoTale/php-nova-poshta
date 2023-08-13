<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\DataRepository;
use BladL\NovaPoshta\DataContainers\SettlementSearchItem;
use UnexpectedValueException;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return list<SettlementSearchItem>
     */
    public function getSettlements(): array
    {
        $addresses =   (new DataRepository($this->container->getObjectList()[0]))->arrayList('Addresses');
        /**
         * @var list<array<string,mixed>> $addresses
         */
        return array_map(
            static fn (array $data) => new SettlementSearchItem($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (new DataRepository($this->container->getObjectList()[0]))->int('TotalCount');
    }
}
