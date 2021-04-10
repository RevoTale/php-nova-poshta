<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final class Settlement extends DataContainer
{
    public function getRef(): string
    {
        return $this->data['Ref'];
    }
}
