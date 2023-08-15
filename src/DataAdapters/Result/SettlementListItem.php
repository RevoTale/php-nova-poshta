<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\SettlementItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementListItem extends Result
{
    /**
     * @return list<SettlementItem>
     */
    public function toArray(): array
    {
        return array_map(
            static fn(ObjectNormalizer $data) => new SettlementItem($data),
            $this->container->getDataAsObjectList()
        );
    }
}
