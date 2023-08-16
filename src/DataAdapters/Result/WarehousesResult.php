<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\WarehouseItem;
use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

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
