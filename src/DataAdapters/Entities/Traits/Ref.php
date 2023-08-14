<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait Ref
{
    final public function getRef(): string
    {
        return $this->getField('Ref')->string();
    }
}