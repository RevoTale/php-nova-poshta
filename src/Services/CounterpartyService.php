<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataAdapters\Result\CounterpartiesResult;
use BladL\NovaPoshta\DataAdapters\Result\Counterparty\ContactPersonsResult;
use BladL\NovaPoshta\DataAdapters\Result\Counterparty\CounterpartySaveResult;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\MethodProperties\Counterparty\CounterpartyListProperties;
use BladL\NovaPoshta\MethodProperties\Counterparty\CounterpartySaveProperties;

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
    public function findCounterparties(CounterpartyListProperties $params): CounterpartiesResult
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
