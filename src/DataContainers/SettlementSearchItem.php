<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\Referencable;

final class SettlementSearchItem extends DataContainer
{
    use Referencable;

    public function getPresent(): string
    {
        return $this->getStr('Present');
    }

    public function getWarehouseCount(): int
    {
        return $this->getInt('Warehouses');
    }

    public function getMainDescription(): string
    {
        return $this->getStr('MainDescription');
    }

    public function getArea(): string
    {
        return $this->getStr('Area');
    }

    public function getRegion(): string
    {
        return $this->getStr('Region');
    }

    public function getSettlementTypeCode(): string
    {
        return $this->getStr('SettlementTypeCode');
    }

    public function getDeliveryCityRef(): string
    {
        return $this->getStr('DeliveryCity');
    }

    public function isAddressDeliveryAllowed(): bool
    {
        return $this->getBool('AddressDeliveryAllowed');
    }

    public function hasStreetsAvailability(): bool
    {
        return $this->getBool('StreetsAvailability');
    }

    public function getParentRegionType(): string
    {
        return $this->getStr('ParentRegionTypes');
    }

    public function getParentRegionCode(): string
    {
        return $this->getStr('ParentRegionCode');
    }

    public function getRegionType(): string
    {
        return $this->getStr('RegionTypes');
    }

    public function getRegionTypeCode(): string
    {
        return $this->getStr('RegionTypesCode');
    }
}
