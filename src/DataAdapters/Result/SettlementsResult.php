<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entities\Settlement;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Decorator\ObjectDecorator;

final readonly class SettlementsResult extends Result
{
    /**
     * @return list<Settlement>
     */
    public function toArray(): array
    {
        return array_map(static fn (ObjectDecorator $data) => new Settlement($data), $this->container->getDataAsObjectList());
    }
}
