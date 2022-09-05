<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementSearchItem;

final class SettlementSearchResult extends Result
{
    /**
     * @return SettlementSearchItem[]
     */
    public function getSettlements(): array
    {
        return array_map(
            static fn (array $data) => new SettlementSearchItem($data),
            $this->container->getData()[0]['Addresses']
        );
    }

    public function getTotalCount(): int
    {
        return $this->container->getData()[0]['TotalCount'];
    }
}
