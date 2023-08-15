<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\SearchSettlementResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementAreaListResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementRegionListResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementSearchResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementListItem;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\MethodProperties\Address\SettlementAreaListProperties;
use BladL\NovaPoshta\MethodProperties\Address\SettlementRegionListProperties;
use BladL\NovaPoshta\MethodProperties\Address\SettlementSearchProperties;

final readonly class SettlementService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function getSettlementList(int $page, int $limit): SettlementListItem
    {
        return new SettlementListItem(
            $this->api->fetch('AddressGeneral', 'getSettlements', [
                'Page' => $page,
                'Limit' => $limit,
            ])
        );
    }
    /**
     * @throws QueryFailedException
     */
    public function searchSettlementStreets(
        string $streetName,
        string $settlementRef,
        int    $limit,
        int    $page = 1
    ): SearchSettlementResult {
        return new SearchSettlementResult($this->api->fetch('Address', 'searchSettlementStreets', [
            'StreetName' => $streetName,
            'SettlementRef' => $settlementRef,
            'Limit' => $limit,
            'Page' => $page,
        ]));
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementAreaList(SettlementAreaListProperties $params): SettlementAreaListResult
    {
        return new SettlementAreaListResult($this->api->fetch('Address', 'getSettlementAreas', $params->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementCountryRegionList(SettlementRegionListProperties $params): SettlementRegionListResult
    {
        return new SettlementRegionListResult(
            $this->api->fetch(
                'Address',
                'getSettlementCountryRegion',
                $params->getProperties()
            )
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function searchSettlements(SettlementSearchProperties $search): SettlementSearchResult
    {
        return new SettlementSearchResult(
            $this->api->fetch('Address', 'searchSettlements', $search->getProperties())
        );
    }
}
