<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\SettlementSearchItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class SettlementSearchResult extends Result
{
    /**
     * @return list<SettlementSearchItem>
     * @throws BadValueException
     */
    public function getSettlements(): array
    {
        $addresses = (($this->container->getDataAsObjectList()[0]))->field('Addresses')->objectList();
        return array_map(
            static fn (ObjectNormalizer $data) => new SettlementSearchItem($data),
            $addresses
        );
    }

    /**
     * @return int
     * @throws BadValueException
     */
    public function getTotalCount(): int
    {
        return (($this->container->getDataAsObjectList()[0]))->field('TotalCount')->integer();
    }
}
