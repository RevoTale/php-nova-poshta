<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\Counterparty;

final class CounterpartiesResult extends Result
{
    public function getCounterparties(): array
    {
        return array_map(static fn (array $data) => new Counterparty($data), $this->container->getData());
    }
}
