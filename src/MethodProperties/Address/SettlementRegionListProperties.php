<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Address;

use BladL\NovaPoshta\Normalizer\MethodProperties;

class SettlementRegionListProperties extends MethodProperties
{
    public function setAreaRef(string $ref): void
    {
        $this->setStr('AreaRef', $ref);
    }
}
