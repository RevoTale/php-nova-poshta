<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Normalizer\ParametersBuilder;
use BladL\NovaPoshta\Decorators\Enums\CounterpartyPersonType;
use BladL\NovaPoshta\Parameters\Traits\Pageable;

class CounterpartiesSearch extends ParametersBuilder
{
    use Pageable;

    public function setKind(CounterpartyPersonType $kind): void
    {
        $this->setStr('CounterpartyProperty', $kind->toString());
    }

    public function findByString(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
