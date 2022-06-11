<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\Warehouse;

/**
 * @internal
 */
final class WarehousesResult extends Result
{
    use Countable;

    protected function getResultContainer(): ResultContainer
    {
        return $this->container;
    }

    /**
     * @return Warehouse[]
     */
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new Warehouse($data), $this->container->getData());
    }
}
