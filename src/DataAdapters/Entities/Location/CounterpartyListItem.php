<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class CounterpartyListItem extends Entity
{
    use RefTrait;
    use DescriptionTrait;

    public function getCityRef(): string
    {
        return $this->getField('City')->string();
    }
}
