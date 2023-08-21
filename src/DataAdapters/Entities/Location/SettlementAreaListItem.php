<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementAreaListItem extends Entity
{
    use RefTrait;
    use DescriptionTrait;
    public function getAreaCenterRef(): string
    {
        return $this->getField('AreasCenter')->string();
    }

    public function getRegionType(): string
    {
        return $this->getField('RegionType')->string();
    }
}
