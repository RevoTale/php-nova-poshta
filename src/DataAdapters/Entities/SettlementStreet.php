<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities;

use BladL\NovaPoshta\Exception\BadFieldValueException;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementStreet extends Entity
{
    public function getRef(): string
    {
        return $this->getField('SettlementStreetRef')->string();
    }

    public function getDescription(): string
    {
        return $this->getField('SettlementStreetDescription')->string();
    }

    public function getPresent(): string
    {
        return $this->getField('Present')->string();
    }

    public function getTypeRef(): string
    {
        return $this->getField('StreetsType')->string();
    }

    public function getTypeDescription(): string
    {
        return $this->getField('StreetsTypeDescription')->string();
    }

    public function getLocationX(): int
    {
        $index = 0;
        $location = $this->getField('Location')->list();
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        $ordinate = $location[$index];
        if (!is_numeric($ordinate)) {
            throw new BadFieldValueException('Bad ordinate');
        }
        return (int)$ordinate;
    }

    public function getLocationY(): int
    {
        $index = 1;
        $location = $this->getField('Location')->list();
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        $ordinate = $location[$index];
        if (!is_numeric($ordinate)) {
            throw new BadFieldValueException('Bad ordinate');
        }
        return (int)$ordinate;
    }

    public function getDescriptionRu(): string
    {
        return $this->getField('SettlementStreetDescriptionRu')->string();
    }

    public function getSettlementRef(): string
    {
        return $this->getField('SettlementRef')->string();
    }
}
