<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\WarehouseItem;
use BladL\NovaPoshta\DataAdapters\ResponseContainer;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class WarehousesResult extends Result
{
    use Countable;

    protected function getResultContainer(): ResponseContainer
    {
        return $this->container;
    }

    /**
     * @return list<WarehouseItem>
     */
    public function toArray(): array
    {
        return array_map(
            static fn (ObjectNormalizer $data) => new WarehouseItem($data),
            $this->container->getDataAsObjectList()
        );
    }
}
