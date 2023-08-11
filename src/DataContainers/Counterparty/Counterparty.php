<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Counterparty;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\Types\CounterpartyType;

readonly class Counterparty extends DataContainer
{
    public function getRef(): string
    {
        return $this->data->string('Ref');
    }

    public function getDescription(): string
    {
        return $this->data->string('Description');
    }

    public function getFirstName(): string
    {
        return $this->data->string('FirstName');
    }

    public function getMiddleName(): string
    {
        return $this->data->string('MiddleName');
    }

    public function getLastName(): string
    {
        return $this->data->string('LastName');
    }

    public function getEDRPOU(): string
    {
        return $this->data->string('EDRPOU');
    }

    public function getCounterpartyType(): CounterpartyType
    {
        return CounterpartyType::from($this->data->string('CounterpartyType'));
    }
}
