<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

trait Referencable
{
    use StringAccess;

    public function getRef(): string
    {
        return $this->getStr('Ref');
    }
}
