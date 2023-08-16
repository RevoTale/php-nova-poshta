<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty\CounterpartyWithContactPerson;
use Grisaia\NovaPoshta\DataAdapters\Result;

final readonly class CounterpartySaveResult extends Result
{
    public function getCounterParty(): CounterpartyWithContactPerson
    {
        return new CounterpartyWithContactPerson($this->container->getDataAsObjectList()[0]);
    }
}
