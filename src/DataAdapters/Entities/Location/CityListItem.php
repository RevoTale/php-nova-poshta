<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Location;

use BladL\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRu;
use BladL\NovaPoshta\DataAdapters\Entities\Traits\PartOfArea;
use BladL\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class CityListItem extends Entity
{
    use Ref;
    use DescriptionWithRu;
    use PartOfArea;
}
