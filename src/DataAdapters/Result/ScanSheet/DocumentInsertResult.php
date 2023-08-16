<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use Grisaia\NovaPoshta\DataAdapters\Entity;

/**
 * @internal
 */
abstract readonly class DocumentInsertResult extends Entity
{
    use Ref;

    public function getNumber(): ?string
    {
        return $this->getNullableField('Number')->string();
    }
}
