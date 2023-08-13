<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\WarehouseType;

final readonly class WarehouseTypesResult extends Result
{
    /**
     * @return list<WarehouseType>
     */
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new WarehouseType($data), $this->container->getObjectList());
    }
}
