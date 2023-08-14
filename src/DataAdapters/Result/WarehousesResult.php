<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Warehouse;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Decorator\ObjectDecorator;

final readonly class WarehousesResult extends Result
{
    use Countable;

    protected function getResultContainer(): ResultContainer
    {
        return $this->container;
    }

    /**
     * @return list<Warehouse>
     */
    public function toArray(): array
    {
        return array_map(
            static fn (ObjectDecorator $data) => new Warehouse($data),
            $this->container->getDataAsObjectList()
        );
    }
}