<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Decorators\Objects\Settlement;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class SettlementsResult extends Result
{
    /**
     * @return list<Settlement>
     */
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new Settlement($data), $this->container->getObjectList());
    }
}
