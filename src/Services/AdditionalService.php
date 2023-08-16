<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Result\AdditionalService\ShippingDataUpdateRequestResult;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;

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
