<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Exceptions\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\Parameters\ShippingDataInfo;
use BladL\NovaPoshta\Results\AdditionalService\ShippingDataUpdateRequestResult;

final readonly class AdditionalService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function requestShippingDataUpdate(
        string           $documentNumber,
        ShippingDataInfo $info
    ): ShippingDataUpdateRequestResult
    {
        $params = [
            'IntDocNumber' => $documentNumber,
            'OrderType' => 'orderChangeEW',
        ];
        $recipientPhoneNumber = $info->recipientPhoneNumber;
        if (null !== $recipientPhoneNumber) {
            $params['RecipientPhone'] = $recipientPhoneNumber;
        }
        return new ShippingDataUpdateRequestResult($this->api->fetch(
            model: 'AdditionalService',
            method: 'save',
            params: $params
        ));
    }
}
