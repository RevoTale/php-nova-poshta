<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\AdditionalService\ShippingDataUpdateRequestResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;

final readonly class AdditionalService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function requestAdditionalService(
        AdditionalServiceSaveProperties $properties
    ): ShippingDataUpdateRequestResult {
        return new ShippingDataUpdateRequestResult($this->api->fetch(
            model: 'AdditionalService',
            method: 'save',
            params: $properties->getProperties()
        ));
    }
}
