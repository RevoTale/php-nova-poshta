<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementStreet;
use UnexpectedValueException;

final readonly class SearchSettlementResult extends Result
{
    /**
     * @return list<SettlementStreet>
     */
    public function getStreets(): array
    {
        $addresses = $this->container->getDataAsList()[0]['Addresses'];
        if (!array_is_list($addresses)) {
            throw new UnexpectedValueException('Returned data not a list');
        }
        return array_map(
            static fn (array $data) => new SettlementStreet($data),
            $addresses
        );
    }

    public function getTotalCount(): int
    {
        return $this->container->getData()[0]['TotalCount'];
    }
}
