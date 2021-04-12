<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

trait PartOfArea
{
    use StringAccess;

    public function getAreaDescription(): string
    {
        return $this->getStr('AreaDescription');
    }

    public function getAreaDescriptionRu(): string
    {
        return $this->getStr('AreaDescriptionRu');
    }
}
