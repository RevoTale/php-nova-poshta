<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementListItem extends Result
{
    /**
     * @return list<SettlementItem>
     */
    public function toArray(): array
    {
        return array_map(
            static fn (ObjectNormalizer $data): \Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementItem => new SettlementItem($data),
            $this->container->getDataAsObjectList()
        );
    }
}
