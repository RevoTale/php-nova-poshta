<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Address;

use BladL\NovaPoshta\Normalizer\MethodProperties;

final class SettlementStreetSearchProperties extends MethodProperties
{
    public function __construct(int $limit=50)
    {
        $this->setLimit($limit);
    }

    public function setLimit(int $limit): void
    {
        $this->setInt('Limit', $limit);
    }

    public function setStreetName(string $streetName): void
    {
        $this->setStr('StreetName', $streetName);
    }

    public function setSettlementRef(string $settlementRef): void
    {
        $this->setStr('SettlementRef', $settlementRef);
    }

}
