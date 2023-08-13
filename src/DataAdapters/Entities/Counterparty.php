<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities;

use BladL\NovaPoshta\DataAdapters\Entities\Traits\Description;
use BladL\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class Counterparty extends Entity
{
    use Ref;
    use Description;

    public function getCityRef(): string
    {
        return $this->getField('City')->string();
    }
}
