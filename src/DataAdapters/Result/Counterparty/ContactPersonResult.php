<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Counterparty;

use BladL\NovaPoshta\Decorators\Objects\Counterparty\ContactPerson;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class ContactPersonResult extends Result
{
    public function getContactPerson(): ContactPerson
    {
        return new ContactPerson($this->container->getObjectList()[0]);
    }
}
