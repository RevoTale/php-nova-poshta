<?php
declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties;

class ShippingDataInfo
{
    public function __construct(
        public readonly ?string $recipientPhoneNumber = null
    )
    {
    }
}
