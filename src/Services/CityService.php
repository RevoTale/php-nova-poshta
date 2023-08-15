<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\CityFinderResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\MethodProperties\Address\CityListProperties;

final readonly class CityService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function findCities(CityListProperties $parameters): CityFinderResult
    {
        return new CityFinderResult(
            $this->api->fetch('Address', 'getCities', $parameters->getProperties())
        );
    }


}
