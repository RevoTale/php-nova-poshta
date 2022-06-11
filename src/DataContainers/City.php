<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\DescriptionWithRu;
use BladL\NovaPoshta\DataContainers\Traits\PartOfArea;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

/**
 * @internal
 */
final class City extends DataContainer
{
    use Ref;
    use DescriptionWithRu;
    use PartOfArea;
}
