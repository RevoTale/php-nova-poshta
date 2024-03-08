<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Location;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionWithRuTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\PartOfAreaTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class SettlementItem extends Entity
{
    use RefTrait;
    use DescriptionWithRuTrait;
    use PartOfAreaTrait;

    public function getArea(): string
    {

        return $this->getField('Area')->string();
    }

    public function getRegion(): ?string
    {
        $value = $this->getField('Region')->nullableScalar();
        return $value === "" || $value === null ? null : (string)$value;
    }

    public function getRegionsDescription(): string
    {
        return $this->getField('RegionsDescription')->string();
    }

    public function getRegionsDescriptionRu(): string
    {
        return $this->getField('RegionsDescriptionRu')->string();
    }

    public function getRegionsDescriptionTranslit(): string
    {
        return $this->getField('RegionsDescriptionTranslit')->string();
    }

    public function getAreaDescription(): string
    {
        return $this->getField('AreaDescription')->string();
    }

    public function getAreaDescriptionRu(): string
    {
        return $this->getField('RegionsDescriptionRu')->string();
    }

    public function getAreaDescriptionTranslit(): string
    {
        return $this->getField('AreaDescriptionTranslit')->string();
    }

    public function getDescriptionTranslit(): string
    {
        return $this->getField('DescriptionTranslit')->string();
    }

    public function getSettlementTypeDescription(): string
    {
        return $this->getField('SettlementTypeDescription')->string();

    }

    public function getSettlementTypeDescriptionRu(): string
    {

        return $this->getField('SettlementTypeDescriptionRu')->string();
    }

    public function getSettlementTypeDescriptionTranslit(): string
    {
        return $this->getField('RegionsDescriptionTranslit')->string();
    }
}
