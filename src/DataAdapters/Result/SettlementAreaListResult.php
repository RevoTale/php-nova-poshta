<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Location\SettlementAreaListItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementAreaListResult extends Result
{
    /**
     * @return list<SettlementAreaListItem>
     */
    public function getAreas(): array
    {
        return array_map(
            static fn (ObjectNormalizer $decorator) => new SettlementAreaListItem($decorator),
            $this->container->getDataAsObjectList()
        );
    }
}
