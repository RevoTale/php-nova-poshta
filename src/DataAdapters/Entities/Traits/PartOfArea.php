<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Traits;

/**
 * @internal
 */
trait PartOfArea
{
    final public function getAreaDescription(): string
    {
        return $this->getField('AreaDescription')->string();
    }

    final public function getAreaDescriptionRu(): string
    {
        return $this->getField('AreaDescriptionRu')->string();
    }
}
