<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait DescriptionWithRuTrait
{
    use DescriptionTrait;

    final public function getDescriptionRu(): string
    {
        return $this->getField('DescriptionRu')->string();
    }
}
