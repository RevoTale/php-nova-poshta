<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Counterparty;

use BladL\NovaPoshta\Decorators\Objects\Counterparty\ContactPerson;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class ContactPersonsResult extends Result
{
    /**
     * @return list<ContactPerson>
     */
    public function getContactPersons(): array
    {
        return array_map(static fn (array $data) => new ContactPerson($data), $this->container->getObjectList());
    }
}
