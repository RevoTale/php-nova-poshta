<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Counterparty;

use BladL\NovaPoshta\DataAdapters\Entities\Counterparty\CounterpartyWithContactPerson;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class CounterpartySaveResult extends Result
{
    public function getCounterParty(): CounterpartyWithContactPerson
    {
        return new CounterpartyWithContactPerson($this->container->getDataAsObjectList()[0]);
    }
}
