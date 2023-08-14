<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Counterparty;

use BladL\NovaPoshta\DataAdapters\Entities\Counterparty\ContactPerson;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class ContactPersonsResult extends Result
{
    /**
     * @return list<ContactPerson>
     */
    public function getContactPersons(): array
    {
        return array_map(static fn (ObjectNormalizer $data) => new ContactPerson($data), $this->container->getDataAsObjectList());
    }
}
