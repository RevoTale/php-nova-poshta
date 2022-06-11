<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait Describable
{
    use StringAccess;

    public function getDescription(): string
    {
        return $this->getStr('Description');
    }
}
