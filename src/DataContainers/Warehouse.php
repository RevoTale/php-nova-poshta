<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final class Warehouse extends DataContainer
{
    public function getRef(): string
    {
        return $this->data['Ref'];
    }

    public function getDescription(): string
    {
        return $this->data['Description'];
    }

    public function getDescriptionRu(): string
    {
        return $this->data['DescriptionRu'];
    }

    public function getWarehouseTypeRef(): string
    {
        return $this->data['TypeOfWarehouse'];
    }

    public function getSettlementRef(): string
    {
        return $this->data['SettlementRef'];
    }

    public function getSettlementDescription(): string
    {
        return $this->data['SettlementDescription'];
    }

    public function getSettlementAreaDescription(): string
    {
        return $this->data['SettlementAreaDescription'];
    }

    public function getSettlementRegionDescription(): string
    {
        return $this->data['SettlementRegionsDescription'];
    }

    public function getSettlementTypeDescription(): string
    {
        return $this->data['SettlementTypeDescription'];
    }

    public function getRegionCity(): string
    {
        return $this->data['RegionCity'];
    }

    public function getDistrictCode(): string
    {
        return $this->data['DistrictCode'];
    }

    public function getCityRef(): string
    {
        return $this->data['CityRef'];
    }

    public function getCityDescriptionRu(): string
    {
        return $this->data['CityDescriptionRu'];
    }

    public function getCityDescription(): string
    {
        return $this->data['CityDescription'];
    }

    public function getNumber(): int
    {
        return (int) $this->data['Number'];
    }
}
