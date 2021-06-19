<?php

/** @noinspection UnknownInspectionInspection */
/* @noinspection PhpUnused */
declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\DataContainers\Document\TrackingInformation;
use BladL\NovaPoshta\DataContainers\WarehouseType;
use BladL\NovaPoshta\Exceptions\DocumentNotExists;
use BladL\NovaPoshta\Exceptions\QueryFailedException;
use BladL\NovaPoshta\Parameters\CitiesSearch;
use BladL\NovaPoshta\Parameters\CounterpartiesSearch;
use BladL\NovaPoshta\Parameters\SettlementsSearch;
use BladL\NovaPoshta\Parameters\WarehouseSearch;
use BladL\NovaPoshta\Results\CityFinderResult;
use BladL\NovaPoshta\Results\CounterpartiesResult;
use BladL\NovaPoshta\Results\Counterparty\ContactPersonsResult;
use BladL\NovaPoshta\Results\Document\TrackingResult;
use BladL\NovaPoshta\Results\DocumentListResult;
use BladL\NovaPoshta\Results\DocumentListResultItem;
use BladL\NovaPoshta\Results\ScanSheet\DocumentsInsertResult;
use BladL\NovaPoshta\Results\SearchSettlementResult;
use BladL\NovaPoshta\Results\SettlementSearchResult;
use BladL\NovaPoshta\Results\SettlementsResult;
use BladL\NovaPoshta\Results\WarehousesResult;
use BladL\NovaPoshta\Results\WarehouseTypesResult;

class APIService extends APIFetcher
{
    /**
     * @throws QueryFailedException
     */
    public function findCities(CitiesSearch $parameters): CityFinderResult
    {
        return new CityFinderResult(
            $this->execute('Address', 'getCities', $parameters->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function findWarehouses(WarehouseSearch $parameters): WarehousesResult
    {
        return new WarehousesResult($this->execute('Address', 'getWarehouses', $parameters->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypes(): WarehouseTypesResult
    {
        return new WarehouseTypesResult($this->execute('Address', 'getWarehouseTypes', []));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypeByRef(string $ref): WarehouseType
    {
        return new WarehouseType($this->execute('Address', 'getWarehouseTypes', ['Ref' => $ref])->getData()[0]);
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementWarehouses(string $settlementRef): WarehousesResult
    {
        return new WarehousesResult($this->execute('Address', 'getWarehouses', [
            'SettlementRef' => $settlementRef,
        ]));
    }

    /**
     * @throws QueryFailedException
     */
    public function createScanSheetWithDocuments(string ...$documentNumbers): DocumentsInsertResult
    {
        return new DocumentsInsertResult(
            $this->execute('ScanSheet', 'insertDocuments', [
                'DocumentRefs' => $documentNumbers,
            ])
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function getDocument(string $documentNumber): DocumentListResultItem
    {
        return (
        new DocumentListResult(
            $this->execute('InternetDocument', 'getDocumentList', [
                'IntDocNumber' => $documentNumber,
            ])
        )
        )->getDocuments()[0];
    }

    /**
     * @throws QueryFailedException
     */
    public function getDocuments(int $page, int $limit): DocumentListResult
    {
        return
            new DocumentListResult(
                $this->execute('InternetDocument', 'getDocumentList', [
                    'Page' => $page,
                    'Limit' => $limit,
                ])
            );
    }

    /**
     * @throws QueryFailedException
     * @throws DocumentNotExists
     */
    public function trackDocument(string $documentNumber): TrackingInformation
    {
        $tracking = (new TrackingResult(
            $this->execute('TrackingDocument', 'getStatusDocuments', [
                'Documents' => [
                    [
                        'DocumentNumber' => $documentNumber,
                        'Phone' => '',
                    ],
                ],
            ])
        ))->getDocumentsTracking()[0];
        if ($tracking->getStatus()->documentExists()) {
            throw new DocumentNotExists($tracking);
        }

        return $tracking;
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlements(int $page, int $limit): SettlementsResult
    {
        return new SettlementsResult(
            $this->execute('AddressGeneral', 'getSettlements', [
                'Page' => $page,
                'Limit' => $limit,
            ])
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function findCounterparties(CounterpartiesSearch $params): CounterpartiesResult
    {
        return new CounterpartiesResult($this->execute('Counterparty', 'getCounterparties', $params->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getCounterpartyContactPerson(string $ref, int $page): ContactPersonsResult
    {
        return new ContactPersonsResult($this->execute('Counterparty', 'getCounterpartyContactPersons', [
            'Ref' => $ref,
            'Page' => $page,
        ]));
    }

    /**
     * @throws QueryFailedException
     */
    public function searchSettlements(SettlementsSearch $search): SettlementSearchResult
    {
        return new SettlementSearchResult(
            $this->execute('Address', 'searchSettlements', $search->getProperties())
        );
    }

    /**
     * @throws Exceptions\CurlException
     * @throws QueryFailedException
     */
    public function searchSettlementStreets(string $streetName, string $settlementRef, int $limit, int $page = 1): SearchSettlementResult
    {
        return new SearchSettlementResult($this->execute('Address', 'searchSettlementStreets', [
            'StreetName' => $streetName,
            'SettlementRef' => $settlementRef,
            'Limit' => $limit,
            'Page' => $page,
        ]));
    }
}
