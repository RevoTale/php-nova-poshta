<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers;

use BladL\NovaPoshta\Exceptions\BadFieldValueException;

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
        $index = 0;
        $location = $this->data->arrayList('Location');
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        $ordinate = $location[$index];
        if (!is_numeric($ordinate)) {
            throw new BadFieldValueException('Bad ordinate');
        }
        return $ordinate;
    }

    public function getLocationY(): int
    {
        $index = 1;
        $location = $this->data->arrayList('Location');
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        $ordinate = $location[$index];
        if (!is_numeric($ordinate)) {
            throw new BadFieldValueException('Bad ordinate');
        }
        return $ordinate;
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
