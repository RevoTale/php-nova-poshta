<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Decorator\ParametersDecorator;

class SettlementRegionsSearch extends ParametersDecorator
{
    public function setAreaRef(string $ref): void
    {
        $this->setStr('AreaRef', $ref);
    }
}
