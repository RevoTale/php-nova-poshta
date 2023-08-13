<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects;

use BladL\NovaPoshta\Decorators\Objects\Traits\DescriptionWithRu;
use BladL\NovaPoshta\Decorators\Objects\Traits\PartOfArea;
use BladL\NovaPoshta\Decorators\Objects\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class City extends Entity
{
    use Ref;
    use DescriptionWithRu;
    use PartOfArea;
}
