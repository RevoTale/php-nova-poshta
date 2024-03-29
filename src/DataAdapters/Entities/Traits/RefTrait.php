<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait RefTrait
{
    final public function getRef(): string
    {
        return $this->getField('Ref')->string();
    }
}
