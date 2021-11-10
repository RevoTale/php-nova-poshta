<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

final class CitiesSearch extends ParametersBuilder
{
    use Pages;

    public function setCityRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }

    public function setCityNameLike(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
