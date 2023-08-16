<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRu;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class WarehouseType extends Entity
{
    use Ref;
    use DescriptionWithRu;
}
