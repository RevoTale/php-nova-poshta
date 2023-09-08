<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Counterparty;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\DescriptionTrait;
use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\RefTrait;
use Grisaia\NovaPoshta\DataAdapters\Entity;
use Grisaia\NovaPoshta\Exception\BadValueException;

final readonly class ContactPerson extends Entity
{
    use RefTrait;
    use DescriptionTrait;

    /**
     * @throws BadValueException
     */
    public function getPhone(): string
    {
        return $this->getField('Phones')->string();
    }
    /**
     * @throws BadValueException
     */
    public function getEmail(): string
    {
        return $this->getField('Email')->string();
    }
    /**
     * @throws BadValueException
     */
    public function getLastName(): string
    {
        return $this->getField('LastName')->string();
    }
    /**
     * @throws BadValueException
     */
    public function getFirstName(): string
    {
        return $this->getField('FirstName')->string();
    }
    /**
     * @throws BadValueException
     */
    public function getMiddleName(): string
    {
        return $this->getField('MiddleName')->string();
    }
}
