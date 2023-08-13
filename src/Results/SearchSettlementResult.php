<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\DataRepository;
use BladL\NovaPoshta\DataContainers\SettlementStreet;

final readonly class SearchSettlementResult extends Result
{
    /**
     * @return list<SettlementStreet>
     */
    public function getStreets(): array
    {
        $addresses = (new DataRepository($this->container->getObjectList()[0]))->arrayList('Addresses');
        /**
         * @var list<array<string,mixed>> $addresses
         */
        return array_map(
            static fn(array $data) => new SettlementStreet($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (new DataRepository($this->container->getObjectList()[0]))->int('TotalCount');
    }
}
