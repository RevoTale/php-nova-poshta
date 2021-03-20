<?php

/** @noinspection PhpUnused */
declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI;

use Awanturist\NovaPoshtaAPI\Exceptions\QueryFailedException;
use Awanturist\NovaPoshtaAPI\Results\CityFinderResult;

final class APIService extends APIFetcher
{
    /**
     * @throws QueryFailedException
     */
    public function findCityByString(string $city): CityFinderResult
    {
        return new CityFinderResult($this->execute('Address', 'getCities', [
            'FindByString' => $city,
        ]));
    }
}
