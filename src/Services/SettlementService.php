<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\SearchSettlementResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementAreasResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementRegionsResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementSearchResult;
use BladL\NovaPoshta\DataAdapters\Result\SettlementsResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\Parameters\SettlementAreaSearch;
use BladL\NovaPoshta\Parameters\SettlementsSearch;

final readonly class SettlementService extends Service
{
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
    public function getSettlementAreas(SettlementAreaSearch $params): SettlementAreasResult
    {
        return new SettlementAreasResult($this->api->fetch('Address', 'getSettlementAreas', $params->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementCountryRegion(SettlementAreaSearch $params): SettlementRegionsResult
    {
        return new SettlementRegionsResult(
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
    public function searchSettlements(SettlementsSearch $search): SettlementSearchResult
    {
        return new SettlementSearchResult(
            $this->api->fetch('Address', 'searchSettlements', $search->getProperties())
        );
    }
}
