<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

use BladL\NovaPoshta\Types\CounterpartyKind;
use BladL\NovaPoshta\Types\CounterpartyType;

final class CounterpartySaveInfo extends ParametersBuilder
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

    public function setCounterpartyKind(CounterpartyKind $property): void
    {
        $this->setStr('CounterpartyProperty', $property->toString());
    }

    public function setEmail(string $email): void
    {
        $this->setStr('Email', $email);
    }
}
