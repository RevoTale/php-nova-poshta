<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Exceptions\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\Parameters\CounterpartiesSearch;
use BladL\NovaPoshta\Parameters\CounterpartySaveInfo;
use BladL\NovaPoshta\Results\CounterpartiesResult;
use BladL\NovaPoshta\Results\Counterparty\ContactPersonsResult;
use BladL\NovaPoshta\Results\Counterparty\CounterpartySaveResult;

final readonly class CounterpartyService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function saveCounterparty(CounterpartySaveInfo $saveInfo): CounterpartySaveResult
    {
        return new CounterpartySaveResult(
            $this->api->fetch('Counterparty', 'save', $saveInfo->getProperties())
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function findCounterparties(CounterpartiesSearch $params): CounterpartiesResult
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
