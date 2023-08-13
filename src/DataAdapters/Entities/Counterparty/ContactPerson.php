<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects\Counterparty;

use BladL\NovaPoshta\Decorators\Objects\Traits\Description;
use BladL\NovaPoshta\Decorators\Objects\Traits\Ref;
use BladL\NovaPoshta\DataAdapters\Entity;

final readonly class ContactPerson extends Entity
{
    use Ref;
    use Description;

    public function getPhone(): string
    {
        return $this->data->string('Phones');
    }

    public function getEmail(): string
    {
        return $this->data->string('Email');
    }

    public function getLastName(): string
    {
        return $this->data->string('LastName');
    }

    public function getFirstName(): string
    {
        return $this->data->string('FirstName');
    }

    public function getMiddleName(): string
    {
        return $this->data->string('MiddleName');
    }
}
