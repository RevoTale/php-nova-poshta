<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Result\SearchSettlementResult;
use Grisaia\NovaPoshta\DataAdapters\Result\SettlementAreaListResult;
use Grisaia\NovaPoshta\DataAdapters\Result\SettlementListItem;
use Grisaia\NovaPoshta\DataAdapters\Result\SettlementRegionListResult;
use Grisaia\NovaPoshta\DataAdapters\Result\SettlementSearchResult;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\Address\SettlementAreaListProperties;
use Grisaia\NovaPoshta\MethodProperties\Address\SettlementRegionListProperties;
use Grisaia\NovaPoshta\MethodProperties\Address\SettlementSearchProperties;

final readonly class SettlementService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function getSettlementList(int $page, int $limit, ?string $regionRef = null, ?string $areaRef = null, ?bool $hasWarehouse = null): SettlementListItem
    {
        $data = [
            'Page' => $page,
            'Limit' => $limit,
        ];
        if ($regionRef !== null) {
            $data['RegionRef'] = $regionRef;
        }

        if ($areaRef !== null && $areaRef !== '' && $areaRef !== '0') {
            $data['AreRef'] = $areaRef;
        }

        if ($hasWarehouse !== null) {
            $data['Warehouse'] = $hasWarehouse;
        }

        return new SettlementListItem(
            $this->api->fetch('AddressGeneral', 'getSettlements', $data)
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
