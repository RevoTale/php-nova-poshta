<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\ScanSheet;

use BladL\NovaPoshta\Decorators\Objects\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

/**
 * @internal
 */
abstract readonly class DocumentInsertResult extends Entity
{
    use Ref;

    public function getNumber(): ?string
    {
        return $this->data->nullOrString('Number');
    }
}
