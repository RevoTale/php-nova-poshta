<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Result\Counterparty\ContactPersonResult;
use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;

final readonly class CounterpartyWithContactPerson extends Counterparty
{

    public function getContactPersonResult(): ContactPersonResult
    {
        return new ContactPersonResult(new ResponseContainer($this->getField('ContactPerson')->object()));
    }
}
