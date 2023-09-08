<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\WarehouseType;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class WarehouseTypesResult extends Result
{
    /**
     * @return list<WarehouseType>
     * @throws BadValueException
     */
    public function toArray(): array
    {
        return array_map(
            static fn (ObjectNormalizer $data) => new WarehouseType($data),
            $this->container->getDataAsObjectList()
        );
    }
}
