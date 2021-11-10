<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\Counterparty;
use BladL\NovaPoshta\DataContainers\Counterparty\CounterpartyWithContact;
use BladL\NovaPoshta\Results\Result;

final class CounterpartySaveResult extends Result
{
    public function getCounterParty(): CounterpartyWithContact
    {
        return new CounterpartyWithContact($this->container->getData()[0]);
    }
}
