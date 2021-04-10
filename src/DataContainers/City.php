<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final class City extends DataContainer
{
    public function getRef(): string
    {
        return $this->data['Ref'];
    }

    public function getDescription(): string
    {
        return $this->data['Description'];
    }
    public function getDescriptionRu(): string
    {
        return $this->data['DescriptionRu'];
    }
}
