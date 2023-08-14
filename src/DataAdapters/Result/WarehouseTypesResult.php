<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\WarehouseType;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class WarehouseTypesResult extends Result
{
    /**
     * @return list<WarehouseType>
     */
    public function toArray(): array
    {
        return array_map(static fn (ObjectNormalizer $data) => new WarehouseType($data), $this->container->getDataAsObjectList());
    }
}
