<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Counterparty;

use BladL\NovaPoshta\DataAdapters\Entities\Counterparty\CounterpartyWithContact;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class CounterpartySaveResult extends Result
{
    public function getCounterParty(): CounterpartyWithContact
    {
        return new CounterpartyWithContact($this->container->getObjectList()[0]);
    }
}
