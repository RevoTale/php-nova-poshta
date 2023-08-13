<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Decorator\ParametersDecorator;

class SettlementAreaSearch extends ParametersDecorator
{
    public function setRef(string $ref): void
    {
        $this->setStr('Ref', $ref);
    }
}
