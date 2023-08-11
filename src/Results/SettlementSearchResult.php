<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementSearchItem;
use UnexpectedValueException;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return list<SettlementSearchItem>
     */
    public function getSettlements(): array
    {
        $addresses =   $this->container->getDataAsList()[0]['Addresses'];
        if (!array_is_list($addresses)) {
            throw new UnexpectedValueException('Bad Adresses returned');
        }
        return array_map(
            static fn (array $data) => new SettlementSearchItem($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return $this->container->getData()[0]['TotalCount'];
    }
}
