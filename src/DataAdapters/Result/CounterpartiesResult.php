<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Counterparty;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class CounterpartiesResult extends Result
{
    /**
     * @return list<Counterparty>
     */
    public function getCounterparties(): array
    {
        return array_map(
        /**
         * @param array<string,mixed> $data
         */
            static fn(array $data): Counterparty => new Counterparty($data),
            $this->container->getObjectList()
        );
    }
}
