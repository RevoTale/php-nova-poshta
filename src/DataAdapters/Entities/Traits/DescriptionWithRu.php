<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait DescriptionWithRu
{
    use Description;

    final public function getDescriptionRu(): string
    {
        return $this->getField('DescriptionRu')->string();
    }
}
