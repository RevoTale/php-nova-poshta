<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\CityListItem;
use Grisaia\NovaPoshta\DataAdapters\Result\CityListResult;
use Grisaia\NovaPoshta\Exception\CityBySettlementException;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\Address\CityListProperties;
use function count;

final readonly class CityService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function getCityList(CityListProperties $parameters): CityListResult
    {
        return new CityListResult(
            $this->api->fetch('Address', 'getCities', $parameters->getProperties())
        );
    }

    /**
     * Used to convert settlement to city. NovaPoshta has different meaning for it for some reason.
     * @throws QueryFailedException|CityBySettlementException
     */
    public function getCityBySettlement(string $settlementRef): CityListItem
    {
        $props = new CityListProperties();
        $props->setPagination(page: 1, recordsPerPage: 2);
        $props->setSettlementRef($settlementRef);
        $cities = $this->getCityList($props)->getCities();
        if (0 === count($cities)) {

            throw new CityBySettlementException('No cities found for settlement');

        }
        if (count($cities) > 1) {
            throw new CityBySettlementException('Too much cities found');

        }
        [$city] = $cities;
        return $city;
    }
}
