<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Counterparty;

use BladL\NovaPoshta\Decorators\Enums\CounterpartyPersonType;
use BladL\NovaPoshta\MethodProperties\Traits\Pageable;
use BladL\NovaPoshta\Normalizer\MethodProperties;

class CounterpartyListProperties extends MethodProperties
{
    use Pageable;

    public function __construct(
        CounterpartyPersonType $counterpartyType
    ) {
        $this->setCounterpartyType($counterpartyType);
    }

    public function setCounterpartyType(CounterpartyPersonType $counterpartyType): void
    {
        $this->setStr('CounterpartyProperty', $counterpartyType->toString());
    }

    public function findByString(string $string): void
    {
        $this->setStr('FindByString', $string);
    }
}
