<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Counterparty;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\Types\CounterpartyType;

class Counterparty extends DataContainer
{
    public function getRef(): string
    {
        return $this->getStr('Ref');
    }

    public function getDescription(): string
    {
        return $this->getStr('Description');
    }

    public function getFirstName(): string
    {
        return $this->getStr('FirstName');
    }

    public function getMiddleName(): string
    {
        return $this->getStr('MiddleName');
    }

    public function getLastName(): string
    {
        return $this->getStr('LastName');
    }

    public function getEDRPOU(): string
    {
        return $this->getStr('EDRPOU');
    }

    public function getCounterpartyType(): CounterpartyType
    {
        return CounterpartyType::fromString($this->getStr('CounterpartyType'));
    }
}
