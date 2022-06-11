<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\Ref;

/**
 * @internal
 */
final class SettlementSearchItem extends DataContainer
{
    use Ref;

    public function getPresent(): string
    {
        return $this->data->string('Present');
    }

    public function getWarehouseCount(): int
    {
        return $this->data->int('Warehouses');
    }

    public function getMainDescription(): string
    {
        return $this->data->string('MainDescription');
    }

    public function getArea(): string
    {
        return $this->data->string('Area');
    }

    public function getRegion(): string
    {
        return $this->data->string('Region');
    }

    public function getSettlementTypeCode(): string
    {
        return $this->data->string('SettlementTypeCode');
    }

    public function getDeliveryCityRef(): string
    {
        return $this->data->string('DeliveryCity');
    }

    public function isAddressDeliveryAllowed(): bool
    {
        return $this->data->bool('AddressDeliveryAllowed');
    }

    public function hasStreetsAvailability(): bool
    {
        return $this->data->bool('StreetsAvailability');
    }

    public function getParentRegionType(): string
    {
        return $this->data->string('ParentRegionTypes');
    }

    public function getParentRegionCode(): string
    {
        return $this->data->string('ParentRegionCode');
    }

    public function getRegionType(): string
    {
        return $this->data->string('RegionTypes');
    }

    public function getRegionTypeCode(): string
    {
        return $this->data->string('RegionTypesCode');
    }
}
