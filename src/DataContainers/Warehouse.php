<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\DescriptionWithRu;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

final class Warehouse extends DataContainer
{
    use Ref;
    use DescriptionWithRu;

    public function getWarehouseTypeRef(): string
    {
        return $this->data->string('TypeOfWarehouse');
    }

    public function getSettlementRef(): string
    {
        return $this->data->string('SettlementRef');
    }

    public function getSettlementDescription(): string
    {
        return $this->data->string('SettlementDescription');
    }

    public function getSettlementAreaDescription(): string
    {
        return $this->data->string('SettlementAreaDescription');
    }

    public function getSettlementRegionDescription(): string
    {
        return $this->data->string('SettlementRegionsDescription');
    }

    public function getSettlementTypeDescription(): string
    {
        return $this->data->string('SettlementTypeDescription');
    }

    public function getRegionCity(): string
    {
        return $this->data->string('RegionCity');
    }

    public function getDistrictCode(): string
    {
        return $this->data->string('DistrictCode');
    }

    public function getCityRef(): string
    {
        return $this->data->string('CityRef');
    }

    public function isDenyToSelect(): ?bool
    {
        return $this->data->bool('DenyToSelect');
    }

    public function isWorking(): bool
    {
        return 'Working' === $this->data->string('WarehouseStatus');
    }

    public function getCityDescriptionRu(): string
    {
        return $this->data->string('CityDescriptionRu');
    }

    public function getCityDescription(): string
    {
        return $this->data->string('CityDescription');
    }

    public function getNumber(): int
    {
        return (int) $this->data->string('Number');
    }
}
