<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Location;

use BladL\NovaPoshta\DataAdapters\Entities\Traits\Description;
use BladL\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementRegionItem extends Entity
{
    use Ref;
    use Description;
    public function getAreaCenterRef(): string
    {
        return $this->getField('AreasCenter')->string();
    }

    public function getRegionType(): string
    {
        return $this->getField('RegionType')->string();
    }
}
