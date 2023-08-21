<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Address;

use Grisaia\NovaPoshta\Normalizer\MethodProperties;

class SettlementRegionListProperties extends MethodProperties
{
    public function setAreaRef(string $ref): void
    {
        $this->setStr('AreaRef', $ref);
    }
}
