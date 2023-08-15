<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\CityListResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\MethodProperties\Address\CityListProperties;

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


}
