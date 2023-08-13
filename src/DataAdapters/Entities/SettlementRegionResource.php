<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects;

use BladL\NovaPoshta\Decorators\Objects\Traits\Description;
use BladL\NovaPoshta\Decorators\Objects\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementRegionResource extends Entity
{
    use Ref;
    use Description;
    public function getAreaCenterRef(): string
    {
        return $this->data->string('AreasCenter');
    }

    public function getRegionType(): string
    {
        return $this->data->string('RegionType');
    }
}
