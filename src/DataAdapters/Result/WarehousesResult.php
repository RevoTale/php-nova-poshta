<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorators\Objects\Warehouse;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class WarehousesResult extends Result
{
    use Countable;

    protected function getResultContainer(): ResultContainer
    {
        return $this->container;
    }

    /**
     * @return Warehouse
     */
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new Warehouse($data), $this->container->getObjectList());
    }
}
