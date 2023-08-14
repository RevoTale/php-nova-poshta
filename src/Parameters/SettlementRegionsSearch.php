<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Normalizer\ParametersBuilder;

class SettlementRegionsSearch extends ParametersBuilder
{
    public function setAreaRef(string $ref): void
    {
        $this->setStr('AreaRef', $ref);
    }
}
