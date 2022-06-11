<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait DescriptionMulti
{
    use Describable;

    public function getDescriptionRu(): string
    {
        return $this->getStr('DescriptionRu');
    }
}
