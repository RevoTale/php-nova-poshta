<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;

final readonly class ContactPerson extends Entity
{
    use RefTrait;
    use DescriptionTrait;

    public function getPhone(): string
    {
        return $this->getField('Phones')->string();
    }

    public function getEmail(): string
    {
        return $this->getField('Email')->string();
    }

    public function getLastName(): string
    {
        return $this->getField('LastName')->string();
    }

    public function getFirstName(): string
    {
        return $this->getField('FirstName')->string();
    }

    public function getMiddleName(): string
    {
        return $this->getField('MiddleName')->string();
    }
}
