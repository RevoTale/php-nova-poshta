<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait PartOfArea
{
    public function getAreaDescription(): string
    {
        return $this->data->string('AreaDescription');
    }

    public function getAreaDescriptionRu(): string
    {
        return $this->data->string('AreaDescriptionRu');
    }
}
