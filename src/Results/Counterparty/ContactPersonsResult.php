<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\Counterparty;

use BladL\NovaPoshta\DataContainers\Counterparty\ContactPerson;
use BladL\NovaPoshta\Results\Result;

final readonly class ContactPersonsResult extends Result
{
    /**
     * @return list<ContactPerson>
     */
    public function getContactPersons(): array
    {
        return array_map(static fn (array $data) => new ContactPerson($data), $this->container->getDataAsList());
    }
}
