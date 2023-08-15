<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Location;

use BladL\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementSearchItem extends Entity
{
    use Ref;

    public function getPresent(): string
    {
        return $this->getField('Present')->string();
    }

    public function getWarehouseCount(): int
    {
        return $this->getField('Warehouses')->integer();
    }

    public function getMainDescription(): string
    {
        return $this->getField('MainDescription')->string();
    }

    public function getArea(): string
    {
        return $this->getField('Area')->string();
    }

    public function getRegion(): string
    {
        return $this->getField('Region')->string();
    }

    public function getSettlementTypeCode(): string
    {
        return $this->getField('SettlementTypeCode')->string();
    }

    public function getDeliveryCityRef(): string
    {
        return $this->getField('DeliveryCity')->string();
    }

    public function isAddressDeliveryAllowed(): bool
    {
        return $this->getField('AddressDeliveryAllowed')->bool();
    }

    public function hasStreetsAvailability(): bool
    {
        return $this->getField('StreetsAvailability')->bool();
    }

    public function getParentRegionType(): string
    {
        return $this->getField('ParentRegionTypes')->string();
    }

    public function getParentRegionCode(): string
    {
        return $this->getField('ParentRegionCode')->string();
    }

    public function getRegionType(): string
    {
        return $this->getField('RegionTypes')->string();
    }

    public function getRegionTypeCode(): string
    {
        return $this->getField('RegionTypesCode')->string();
    }
}
