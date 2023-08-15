<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Location;

use BladL\NovaPoshta\DataAdapters\Entity;
use BladL\NovaPoshta\Exception\BadFieldValueException;

final readonly class SettlementStreetItem extends Entity
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

    /**
     * @throws BadFieldValueException
     */
    public function getLocationX(): int
    {
        $index = 0;
        $location = $this->getField('Location')->list();
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        return $location[$index]->integer();;
    }

    /**
     * @throws BadFieldValueException
     */
    public function getLocationY(): int
    {
        $index = 1;
        $location = $this->getField('Location')->list();
        if (!isset($location[$index])) {
            throw new BadFieldValueException('Location has incomplete coordinates');
        }
        return $location[$index]->integer();
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
