<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementAreaListItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementAreaListResult extends Result
{
    /**
     * @return list<SettlementAreaListItem>
     */
    public function getAreas(): array
    {
        return array_map(
            static fn (ObjectNormalizer $decorator): \Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementAreaListItem => new SettlementAreaListItem($decorator),
            $this->container->getDataAsObjectList()
        );
    }
}
