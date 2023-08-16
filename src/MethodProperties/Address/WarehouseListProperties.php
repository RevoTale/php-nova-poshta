<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Address;

use Grisaia\NovaPoshta\MethodProperties\Traits\Pageable;
use Grisaia\NovaPoshta\Normalizer\MethodProperties;

class WarehouseListProperties extends MethodProperties
{
    use Pageable;

    public function satHasBicycleParking(bool $true): void
    {
        $this->setBool('BicycleParking', $true);
    }

    public function setTypeOfWarehouseRef(string $ref): void
    {
        $this->setStr('TypeOfWarehouseRef', $ref);
    }

    public function setCityName(string $string): void
    {
        $this->setStr('CityName', $string);
    }

    public function setSettlementRef(string $ref): void
    {
        $this->setStr('SettlementRef', $ref);
    }

    public function setCityRef(string $ref): void
    {
        $this->setStr('CityRef', $ref);
    }

    public function setHasPostFinance(bool $true): void
    {
        $this->setBool('PostFinance', $true);
    }

    public function findByString(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
