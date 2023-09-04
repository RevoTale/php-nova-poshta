<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRuTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class WarehouseItem extends Entity
{
    use RefTrait;
    use DescriptionWithRuTrait;

    public function getWarehouseTypeRef(): string
    {
        return $this->getField('TypeOfWarehouse')->string();
    }

    public function getSettlementRef(): string
    {
        return $this->getField('SettlementRef')->string();
    }

    public function getLongitude(): float
    {
        return $this->getField('Longitude')->float();
    }

    public function getLatitude(): float
    {
        return $this->getField('Latitude')->float();
    }

    public function getShortAddress(): string
    {
        return $this->getField('ShortAddress')->string();
    }

    public function isOnlyReceivingParcel(): bool
    {
        return $this->getField('OnlyReceivingParcel')->bool();
    }

    public function isWarehouseForAgent(): bool
    {
        return $this->getField('WarehouseForAgent')->bool();
    }

    public function isBicycleParkingAvailable(): bool
    {
        return $this->getField('BicycleParking')->bool();
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
