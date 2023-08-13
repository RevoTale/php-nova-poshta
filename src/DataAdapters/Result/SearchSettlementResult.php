<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Decorators\Objects\SettlementStreet;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SearchSettlementResult extends Result
{
    /**
     * @return list<SettlementStreet>
     */
    public function getStreets(): array
    {
        $addresses = (new ObjectDecorator($this->container->getObjectList()[0]))->arrayList('Addresses');
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
        return (new ObjectDecorator($this->container->getObjectList()[0]))->int('TotalCount');
    }
}
