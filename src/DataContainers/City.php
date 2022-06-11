<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\DescriptionMulti;
use BladL\NovaPoshta\DataContainers\Traits\PartOfArea;
use BladL\NovaPoshta\DataContainers\Traits\Referencable;

/**
 * @internal
 */
final class City extends DataContainer
{
    use Referencable;
    use DescriptionMulti;
    use PartOfArea;
}
