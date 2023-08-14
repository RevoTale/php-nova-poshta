<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\AdditionalService\ShippingDataUpdateRequestResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\Parameters\ShippingDataInfo;

final readonly class AdditionalService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function requestShippingDataUpdate(
        string           $documentNumber,
        ShippingDataInfo $info
    ): ShippingDataUpdateRequestResult {
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
