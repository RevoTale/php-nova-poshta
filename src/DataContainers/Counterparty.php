<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\DataContainers\Traits\Description;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

final class Counterparty extends DataContainer
{
    use Ref;
    use Description;

    public function getCityRef(): string
    {
        return $this->data->string('City');
    }
}
