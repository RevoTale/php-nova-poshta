<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait DescriptionTrait
{
    final public function getDescription(): string
    {
        return $this->getField('Description')->string();
    }
}
