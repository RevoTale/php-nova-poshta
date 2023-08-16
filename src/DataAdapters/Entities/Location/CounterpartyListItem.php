<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Description;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class CounterpartyListItem extends Entity
{
    use Ref;
    use Description;

    public function getCityRef(): string
    {
        return $this->getField('City')->string();
    }
}
