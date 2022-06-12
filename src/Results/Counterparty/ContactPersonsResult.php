<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\Counterparty;

use BladL\NovaPoshta\DataContainers\Counterparty\ContactPerson;
use BladL\NovaPoshta\Results\Result;


final class ContactPersonsResult extends Result
{
    /**
     * @return ContactPerson[]
     */
    public function getContactPersons(): array
    {
        return array_map(static fn (array $data) => new ContactPerson($data), $this->container->getData());
    }
}
