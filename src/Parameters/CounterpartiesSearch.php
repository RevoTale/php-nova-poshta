<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Types\CounterpartyPersonType;

final class CounterpartiesSearch extends ParametersBuilder
{
    use Pages;

    public function setKind(CounterpartyPersonType $kind): void
    {
        $this->setStr('CounterpartyProperty', $kind->toString());
    }

    public function findByString(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
