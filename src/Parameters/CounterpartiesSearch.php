<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Types\CounterpartyKind;

final class CounterpartiesSearch extends ParametersBuilder
{
    use Pages;

    public function setKind(CounterpartyKind $kind): void
    {
        $this->setStr('CounterpartyProperty', $kind->toString());
    }

    public function findByString(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
