<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Result\CityListResult;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\Address\CityListProperties;

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
