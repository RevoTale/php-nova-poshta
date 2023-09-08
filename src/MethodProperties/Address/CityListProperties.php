<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Address;

use Grisaia\NovaPoshta\MethodProperties\Traits\Pageable;
use Grisaia\NovaPoshta\Normalizer\MethodProperties;

class CityListProperties extends MethodProperties
{
    use Pageable;

    public function setCityRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }

    public function setCityNameLike(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
    public function setSettlementRef(string $ref): void
    {
        $this->setStr('SettlementRef', $ref);
    }
}
