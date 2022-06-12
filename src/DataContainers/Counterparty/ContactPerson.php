<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Counterparty;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\DataContainers\Traits\Description;
use BladL\NovaPoshta\DataContainers\Traits\Ref;

final class ContactPerson extends DataContainer
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
