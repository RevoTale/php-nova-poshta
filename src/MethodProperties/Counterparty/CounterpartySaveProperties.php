<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\Counterparty;

use Grisaia\NovaPoshta\Decorators\Enums\CounterpartyPersonType;
use Grisaia\NovaPoshta\Decorators\Enums\CounterpartyType;
use Grisaia\NovaPoshta\Normalizer\MethodProperties;

class CounterpartySaveProperties extends MethodProperties
{
    public function setFirstName(string $name): void
    {
        $this->setStr('FirstName', $name);
    }

    public function setMiddleName(string $name): void
    {
        $this->setStr('MiddleName', $name);
    }

    public function setLastName(string $name): void
    {
        $this->setStr('LastName', $name);
    }

    public function setPhone(string $phone): void
    {
        $this->setStr('Phone', $phone);
    }

    public function setCounterpartyType(CounterpartyType $type): void
    {
        $this->setStr('CounterpartyType', $type->toString());
    }

    public function setEdrpou(string $edrpou): void
    {
        $this->setStr('EDRPOU', $edrpou);
    }

    public function setCounterpartyKind(CounterpartyPersonType $property): void
    {
        $this->setStr('CounterpartyProperty', $property->toString());
    }

    public function setEmail(string $email): void
    {
        $this->setStr('Email', $email);
    }
}
