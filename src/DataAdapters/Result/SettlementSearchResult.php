<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Decorators\Objects\SettlementSearchResource;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return SettlementSearchResource
     */
    public function getSettlements(): array
    {
        $addresses =   (new ObjectDecorator($this->container->getObjectList()[0]))->arrayList('Addresses');
        /**
         * @var list<array<string,mixed>> $addresses
         */
        return array_map(
            static fn (array $data) => new SettlementSearchResource($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return (new ObjectDecorator($this->container->getObjectList()[0]))->int('TotalCount');
    }
}
