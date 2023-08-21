<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Address;

use Grisaia\NovaPoshta\Normalizer\MethodProperties;

class SettlementAreaListProperties extends MethodProperties
{
    public function setRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }
}
