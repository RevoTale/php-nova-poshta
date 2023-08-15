<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\AdditionalService\Save;

use BladL\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceOrderType;
use BladL\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;
//TODO fill each field
class ChangeEWProperties extends AdditionalServiceSaveProperties
{
    public function __construct()
    {
        parent::__construct(orderType: AdditionalServiceOrderType::OrderChangeEW);
    }
}
