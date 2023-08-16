<?php
declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\AdditionalService\Save;

use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceOrderType;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;
//TODO fill each field
class ChangeEWProperties extends AdditionalServiceSaveProperties
{
    public function __construct()
    {
        parent::__construct(orderType: AdditionalServiceOrderType::OrderChangeEW);
    }
}
