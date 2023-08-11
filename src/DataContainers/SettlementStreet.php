<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

final readonly class SettlementStreet extends DataContainer
{
    public function getRef(): string
    {
        return $this->data->string('SettlementStreetRef');
    }

    public function getDescription(): string
    {
        return $this->data->string('SettlementStreetDescription');
    }

    public function getPresent(): string
    {
        return $this->data->string('Present');
    }

    public function getTypeRef(): string
    {
        return $this->data->string('StreetsType');
    }

    public function getTypeDescription(): string
    {
        return $this->data->string('StreetsTypeDescription');
    }

    public function getLocationX(): int
    {
        return $this->data->array('Location')[0];
    }

    public function getLocationY(): int
    {
        return $this->data->array('Location')[1];
    }

    public function getDescriptionRu(): string
    {
        return $this->data->string('SettlementStreetDescriptionRu');
    }

    public function getSettlementRef(): string
    {
        return $this->data->string('SettlementRef');
    }
}
