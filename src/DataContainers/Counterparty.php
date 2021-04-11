<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\Describable;
use BladL\NovaPoshta\DataContainers\Traits\Referencable;

final class Counterparty extends DataContainer
{
    use Referencable;
    use Describable;

    public function getCityRef(): string
    {
        return $this->getStr('City');
    }
}
