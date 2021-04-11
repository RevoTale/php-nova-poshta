<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\DescriptionMulti;
use BladL\NovaPoshta\DataContainers\Traits\Referencable;

final class Settlement extends DataContainer
{
    use Referencable;
    use DescriptionMulti;
}
