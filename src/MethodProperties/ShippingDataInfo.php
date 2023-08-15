<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties;

class ShippingDataInfo
{
    public function __construct(
        public readonly ?string $recipientPhoneNumber = null
    )
    {
    }
}
