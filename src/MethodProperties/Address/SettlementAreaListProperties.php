<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Address;

use BladL\NovaPoshta\Normalizer\MethodProperties;

class SettlementAreaListProperties extends MethodProperties
{
    public function setRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }
}
