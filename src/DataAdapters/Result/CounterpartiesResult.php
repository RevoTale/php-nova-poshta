<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\CounterpartyListItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

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
