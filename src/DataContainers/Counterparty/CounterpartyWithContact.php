<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Counterparty;

use BladL\NovaPoshta\Results\Counterparty\ContactPersonResult;
use BladL\NovaPoshta\Results\ResultContainer;

final class CounterpartyWithContact extends Counterparty
{
    public function getContactPersonResult(): ContactPersonResult
    {
        return new ContactPersonResult(new ResultContainer($this->getArray('ContactPerson')));
    }
}
