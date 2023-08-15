<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\CounterpartyListItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class CounterpartiesResult extends Result
{
    /**
     * @return list<CounterpartyListItem>
     */
    public function getCounterparties(): array
    {
        return array_map(
            static fn (ObjectNormalizer $data): CounterpartyListItem => new CounterpartyListItem($data),
            $this->container->getDataAsObjectList()
        );
    }
}
