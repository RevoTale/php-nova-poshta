<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait PartOfArea
{
    final public function getAreaDescription(): string
    {
        return $this->data->string('AreaDescription');
    }

    final public function getAreaDescriptionRu(): string
    {
        return $this->data->string('AreaDescriptionRu');
    }
}
