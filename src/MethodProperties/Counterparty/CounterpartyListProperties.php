<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Enums\CounterpartyPersonType;
use Grisaia\NovaPoshta\MethodProperties\Traits\Pageable;
use Grisaia\NovaPoshta\Normalizer\MethodProperties;

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
