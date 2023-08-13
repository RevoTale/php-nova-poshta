<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Decorator\ParametersDecorator;
use BladL\NovaPoshta\Parameters\Traits\Pageable;

class CitiesSearch extends ParametersDecorator
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
