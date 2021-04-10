<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

final class WarehouseSearch
{
    private static function boolParam(bool $true): string
    {
        return $true ? '1' : '0';
    }

    private array $data = [];

    public function setPage(int $page): void
    {
        $this->data['Page'] = $page;
    }

    public function setRecordsPerPage(int $limit): void
    {
        $this->data['Limit'] = $limit;
    }

    public function satHasBicycleParking(bool $true): void
    {
        $this->data['BicycleParking'] = self::boolParam($true);
    }

    public function setTypeOfWarehouseRef(string $ref): void
    {
        $this->data['TypeOfWarehouseRef'] = $ref;
    }

    public function setCityName(string $string): void
    {
        $this->data['CityName'] = $string;
    }

    public function setSettlementRef(string $ref): void
    {
        $this->data['SettlementRef'] = $ref;
    }

    public function setCityRef(string $ref): void
    {
        $this->data['CityRef'] = $ref;
    }

    public function setHasPostFinance(bool $true): void
    {
        $this->data['PostFinance'] = self::boolParam($true);
    }

    public function getProperties(): array
    {
        return $this->data;
    }
}
