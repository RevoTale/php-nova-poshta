<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait Description
{
    final public function getDescription(): string
    {
        return $this->getField('Description')->string();
    }
}
