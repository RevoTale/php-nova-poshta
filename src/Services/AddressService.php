<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataContainers\WarehouseType;
use BladL\NovaPoshta\Exceptions\QueryFailedException;
use BladL\NovaPoshta\Parameters\CitiesSearch;
use BladL\NovaPoshta\Parameters\SettlementsSearch;
use BladL\NovaPoshta\Parameters\WarehouseSearch;
use BladL\NovaPoshta\Results\CityFinderResult;
use BladL\NovaPoshta\Results\SearchSettlementResult;
use BladL\NovaPoshta\Results\SettlementSearchResult;
use BladL\NovaPoshta\Results\SettlementsResult;
use BladL\NovaPoshta\Results\WarehousesResult;
use BladL\NovaPoshta\Results\WarehouseTypesResult;

class AddressService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function findCities(CitiesSearch $parameters): CityFinderResult
    {
        return new CityFinderResult(
            $this->api->fetch('Address', 'getCities', $parameters->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function findWarehouses(WarehouseSearch $parameters): WarehousesResult
    {
        return new WarehousesResult($this->api->fetch('Address', 'getWarehouses', $parameters->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypes(): WarehouseTypesResult
    {
        return new WarehouseTypesResult($this->api->fetch('Address', 'getWarehouseTypes', []));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypeByRef(string $ref): WarehouseType
    {
        return new WarehouseType($this->api->fetch('Address', 'getWarehouseTypes', ['Ref' => $ref])->getData()[0]);
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementWarehouses(string $settlementRef): WarehousesResult
    {
        return new WarehousesResult($this->api->fetch('Address', 'getWarehouses', [
            'SettlementRef' => $settlementRef,
        ]));
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlements(int $page, int $limit): SettlementsResult
    {
        return new SettlementsResult(
            $this->api->fetch('AddressGeneral', 'getSettlements', [
                'Page' => $page,
                'Limit' => $limit,
            ])
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function searchSettlements(SettlementsSearch $search): SettlementSearchResult
    {
        return new SettlementSearchResult(
            $this->api->fetch('Address', 'searchSettlements', $search->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function searchSettlementStreets(string $streetName, string $settlementRef, int $limit, int $page = 1): SearchSettlementResult
    {
        return new SearchSettlementResult($this->api->fetch('Address', 'searchSettlementStreets', [
            'StreetName' => $streetName,
            'SettlementRef' => $settlementRef,
            'Limit' => $limit,
            'Page' => $page,
        ]));
    }
}
