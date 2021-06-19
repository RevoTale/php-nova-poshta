<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final class SettlementStreet extends DataContainer
{
    public function getRef(): string
    {
        return $this->getStr('SettlementStreetRef');
    }

    public function getDescription(): string
    {
        return $this->getStr('SettlementStreetDescription');
    }

    public function getPresent(): string
    {
        return $this->getStr('Present');
    }

    public function getTypeRef(): string
    {
        return $this->getStr('StreetsType');
    }

    public function getTypeDescription(): string
    {
        return $this->getStr('StreetsTypeDescription');
    }

    public function getLocationX(): int
    {
        return $this->getArray('Location')[0];
    }

    public function getLocationY(): int
    {
        return $this->getArray('Location')[1];
    }

    public function getDescriptionRu(): string
    {
        return $this->getStr('SettlementStreetDescriptionRu');
    }

    public function getSettlementRef(): string
    {
        return $this->getStr('SettlementRef');
    }
}
