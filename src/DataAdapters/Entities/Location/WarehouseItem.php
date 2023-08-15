<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Location;

use BladL\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRu;
use BladL\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class WarehouseItem extends Entity
{
    use Ref;
    use DescriptionWithRu;

    public function getWarehouseTypeRef(): string
    {
        return $this->getField('TypeOfWarehouse')->string();
    }

    public function getSettlementRef(): string
    {
        return $this->getField('SettlementRef')->string();
    }

    public function getSettlementDescription(): string
    {
        return $this->getField('SettlementDescription')->string();
    }

    public function getSettlementAreaDescription(): string
    {
        return $this->getField('SettlementAreaDescription')->string();
    }

    public function getSettlementRegionDescription(): string
    {
        return $this->getField('SettlementRegionsDescription')->string();
    }

    public function getSettlementTypeDescription(): string
    {
        return $this->getField('SettlementTypeDescription')->string();
    }

    public function getRegionCity(): string
    {
        return $this->getField('RegionCity')->string();
    }

    public function getDistrictCode(): string
    {
        return $this->getField('DistrictCode')->string();
    }

    public function getCityRef(): string
    {
        return $this->getField('CityRef')->string();
    }

    public function isDenyToSelect(): ?bool
    {
        return $this->getNullableField('DenyToSelect')->bool();
    }

    public function isWorking(): bool
    {
        return 'Working' === $this->getField('WarehouseStatus')->string();
    }

    public function getCityDescriptionRu(): string
    {
        return $this->getField('CityDescriptionRu')->string();
    }

    public function getCityDescription(): string
    {
        return $this->getField('CityDescription')->string();
    }

    public function getNumber(): int
    {
        return $this->getField('Number')->integer();
    }
}
