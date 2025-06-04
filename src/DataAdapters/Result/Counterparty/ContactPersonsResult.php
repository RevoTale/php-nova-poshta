<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty\ContactPerson;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class ContactPersonsResult extends Result
{
    /**
     * @return list<ContactPerson>
     */
    public function getContactPersons(): array
    {
        return array_map(static fn (ObjectNormalizer $data): \Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty\ContactPerson => new ContactPerson($data), $this->container->getDataAsObjectList());
    }
}
