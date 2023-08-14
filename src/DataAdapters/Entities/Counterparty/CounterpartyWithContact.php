<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Counterparty;

use BladL\NovaPoshta\DataAdapters\Result\Counterparty\ContactPersonResult;
use BladL\NovaPoshta\DataAdapters\ResponseContainer;

final readonly class CounterpartyWithContact extends Counterparty
{

    public function getContactPersonResult(): ContactPersonResult
    {
        return new ContactPersonResult(new ResponseContainer($this->getField('ContactPerson')->object()));
    }
}
