<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\DataContainers;

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
}
