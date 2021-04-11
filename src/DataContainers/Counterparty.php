<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final class Counterparty extends DataContainer
{
    public function getRef(): string
    {
        return $this->data['Ref'];
    }

    public function getDescription(): string
    {
        return $this->data['Description'];
    }

    public function getCityRef(): string
    {
        return $this->data['City'];
    }
}
