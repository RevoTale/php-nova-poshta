<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\DescriptionMulti;
use BladL\NovaPoshta\DataContainers\Traits\Referencable;

/**
 * @internal
 */
final class Warehouse extends DataContainer
{
    use Referencable;
    use DescriptionMulti;

    public function getWarehouseTypeRef(): string
    {
        return $this->getStr('TypeOfWarehouse');
    }

    public function getSettlementRef(): string
    {
        return $this->getStr('SettlementRef');
    }

    public function getSettlementDescription(): string
    {
        return $this->getStr('SettlementDescription');
    }

    public function getSettlementAreaDescription(): string
    {
        return $this->getStr('SettlementAreaDescription');
    }

    public function getSettlementRegionDescription(): string
    {
        return $this->getStr('SettlementRegionsDescription');
    }

    public function getSettlementTypeDescription(): string
    {
        return $this->getStr('SettlementTypeDescription');
    }

    public function getRegionCity(): string
    {
        return $this->getStr('RegionCity');
    }

    public function getDistrictCode(): string
    {
        return $this->getStr('DistrictCode');
    }

    public function getCityRef(): string
    {
        return $this->getStr('CityRef');
    }

    public function isDenyToSelect(): ?bool
    {
        return $this->getForceBool('DenyToSelect');
    }

    public function isWorking(): bool
    {
        return 'Working' === $this->getStr('WarehouseStatus');
    }

    public function getCityDescriptionRu(): string
    {
        return $this->getStr('CityDescriptionRu');
    }

    public function getCityDescription(): string
    {
        return $this->getStr('CityDescription');
    }

    public function getNumber(): int
    {
        return (int) $this->getStr('Number');
    }
}
