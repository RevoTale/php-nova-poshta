<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty\ContactPerson;
use Grisaia\NovaPoshta\DataAdapters\Result;

final readonly class ContactPersonResult extends Result
{
    public function getContactPerson(): ContactPerson
    {
        return new ContactPerson($this->container->getDataAsObjectList()[0]);
    }
}
