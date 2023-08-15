<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Address;

use BladL\NovaPoshta\MethodProperties\Traits\Pageable;
use BladL\NovaPoshta\Normalizer\MethodProperties;

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
}
