<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRuTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class WarehouseType extends Entity
{
    use RefTrait;
    use DescriptionWithRuTrait;
}
