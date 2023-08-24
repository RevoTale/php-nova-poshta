<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Result\CounterpartiesResult;
use Grisaia\NovaPoshta\DataAdapters\Result\Counterparty\ContactPersonsResult;
use Grisaia\NovaPoshta\DataAdapters\Result\Counterparty\CounterpartySaveResult;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\Counterparty\CounterpartyListProperties;
use Grisaia\NovaPoshta\MethodProperties\Counterparty\CounterpartySaveProperties;

final readonly class CounterpartyService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function saveCounterparty(CounterpartySaveProperties $saveInfo): CounterpartySaveResult
    {
        return new CounterpartySaveResult(
            $this->api->fetch('Counterparty', 'save', $saveInfo->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function getCounterpartyList(CounterpartyListProperties $params): CounterpartiesResult
    {
        return new CounterpartiesResult(
            $this->api->fetch('Counterparty', 'getCounterparties', $params->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function getCounterpartyContactPerson(string $ref, int $page): ContactPersonsResult
    {
        return new ContactPersonsResult($this->api->fetch('Counterparty', 'getCounterpartyContactPersons', [
            'Ref' => $ref,
            'Page' => $page,
        ]));
    }
}
