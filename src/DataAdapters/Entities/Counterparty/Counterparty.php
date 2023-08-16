<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Description;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use Grisaia\NovaPoshta\Decorators\Enums\CounterpartyType;
use Grisaia\NovaPoshta\DataAdapters\Entity;

readonly class Counterparty extends Entity
{
    use Ref;
    use Description;
    public function getFirstName(): string
    {
        return $this->getField('FirstName')->string();
    }

    public function getMiddleName(): string
    {
        return $this->getField('MiddleName')->string();
    }

    public function getLastName(): string
    {
        return $this->getField('LastName')->string();
    }

    public function getEDRPOU(): string
    {
        return $this->getField('EDRPOU')->string();
    }

    public function getCounterpartyType(): CounterpartyType
    {
        return CounterpartyType::from($this->getField('CounterpartyType')->string());
    }
}
