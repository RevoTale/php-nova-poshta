<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection EfferentObjectCouplingInspection
 */
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

/**
 * @deprecated use BladL\NovaPoshta\Services
 */
class APIService
{
    protected NovaPoshtaAPI $service;

    public function __construct(string $apiKey)
    {
        $this->service = new NovaPoshtaAPI($apiKey);
    }

    /**
     * @throws QueryFailedException
     */
    public function findCities(CitiesSearch $parameters): CityFinderResult
    {
        return new CityFinderResult(
            $this->service->fetch('Address', 'getCities', $parameters->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function findWarehouses(WarehouseSearch $parameters): WarehousesResult
    {
        return new WarehousesResult($this->service->fetch('Address', 'getWarehouses', $parameters->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypes(): WarehouseTypesResult
    {
        return new WarehouseTypesResult($this->service->fetch('Address', 'getWarehouseTypes', []));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypeByRef(string $ref): WarehouseType
    {
        return new WarehouseType($this->service->fetch('Address', 'getWarehouseTypes', ['Ref' => $ref])->getData()[0]);
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementWarehouses(string $settlementRef): WarehousesResult
    {
        return new WarehousesResult($this->service->fetch('Address', 'getWarehouses', [
            'SettlementRef' => $settlementRef,
        ]));
    }

    /**
     * @throws QueryFailedException
     */
    public function createScanSheetWithDocuments(string ...$documentNumbers): DocumentsInsertResult
    {
        return new DocumentsInsertResult(
            $this->service->fetch('ScanSheet', 'insertDocuments', [
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
            $this->service->fetch('InternetDocument', 'getDocumentList', [
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
                $this->service->fetch('InternetDocument', 'getDocumentList', [
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
            $this->service->fetch('TrackingDocument', 'getStatusDocuments', [
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
            $this->service->fetch('AddressGeneral', 'getSettlements', [
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
        return new CounterpartiesResult($this->service->fetch('Counterparty', 'getCounterparties', $params->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getCounterpartyContactPerson(string $ref, int $page): ContactPersonsResult
    {
        return new ContactPersonsResult($this->service->fetch('Counterparty', 'getCounterpartyContactPersons', [
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
            $this->service->fetch('Address', 'searchSettlements', $search->getProperties())
        );
    }

    /**
     * @throws Exceptions\CurlException
     * @throws QueryFailedException
     */
    public function searchSettlementStreets(string $streetName, string $settlementRef, int $limit, int $page = 1): SearchSettlementResult
    {
        return new SearchSettlementResult($this->service->fetch('Address', 'searchSettlementStreets', [
            'StreetName' => $streetName,
            'SettlementRef' => $settlementRef,
            'Limit' => $limit,
            'Page' => $page,
        ]));
    }

    public function getDocumentNumByBarcode(string $barcode): string
    {
        return substr($barcode, 0, 14);
    }
}
