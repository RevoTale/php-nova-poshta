<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\Counterparty;

use BladL\NovaPoshta\DataContainers\Counterparty\ContactPerson;
use BladL\NovaPoshta\Results\Result;


final class ContactPersonResult extends Result
{
    public function getContactPerson(): ContactPerson
    {
        return new ContactPerson($this->container->getData()[0]);
    }
}
