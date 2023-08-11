<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

class SettlementAreaSearch extends ParametersBuilder
{
    public function setRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }
}
