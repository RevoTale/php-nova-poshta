<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\Counterparty;

final readonly class CounterpartiesResult extends Result
{
    /**
     * @return list<Counterparty>
     */
    public function getCounterparties(): array
    {
        return array_map(static fn (array $data) => new Counterparty($data), $this->container->getDataAsList());
    }
}
