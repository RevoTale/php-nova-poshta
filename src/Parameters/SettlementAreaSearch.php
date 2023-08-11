<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

final class SettlementAreaSearch extends ParametersBuilder
{
    public function __construct()
    {
    }

    public function setRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }
}
