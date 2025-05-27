<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;


abstract readonly class DocumentInsertResult extends Entity
{
    use RefTrait;

    public function getNumber(): ?string
    {
        return $this->getNullableField('Number')->string();
    }
}
