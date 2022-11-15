<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\AdditionalService;

use BladL\NovaPoshta\Results\Result;

final class ShippingDataUpdateRequestResult extends Result
{
    public function getRequestNumber(): string
    {
        return $this->container->getData()[0]['Number'];
    }
    public function getRequestRef(): string
    {
        return $this->container->getData()[0]['Ref'];
    }
}
