<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

/**
 * @internal
 */
abstract readonly class DocumentInsertResult extends DataContainer
{
    use Ref;

    public function getNumber(): ?string
    {
        return $this->data->nullOrString('Number');
    }
}
