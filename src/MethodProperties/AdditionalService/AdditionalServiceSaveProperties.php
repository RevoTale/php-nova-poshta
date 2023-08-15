<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\AdditionalService;

use BladL\NovaPoshta\Normalizer\MethodProperties;

abstract class AdditionalServiceSaveProperties extends MethodProperties
{
    public function __construct(AdditionalServiceOrderType $orderType)
    {
        $this->setOrderType($orderType);
    }

    public function setOrderType(AdditionalServiceOrderType $orderType): void
    {
        $this->setStr('OrderType', $orderType->value);
    }

    public function setDocumentNumber(string $documentNumber): void
    {
        $this->setStr('IntDocNumber', $documentNumber);
    }
}
