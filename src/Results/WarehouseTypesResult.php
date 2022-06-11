<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\WarehouseType;

/**
 * @internal
 */
final class WarehouseTypesResult extends Result
{
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new WarehouseType($data), $this->container->getData());
    }
}
