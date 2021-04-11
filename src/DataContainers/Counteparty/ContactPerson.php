<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Counteparty;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\DataContainers\Traits\Describable;
use BladL\NovaPoshta\DataContainers\Traits\Referencable;

final class ContactPerson extends DataContainer
{
    use Referencable;
    use Describable;

    public function getPhone(): string
    {
        return $this->getStr('Phones');
    }

    public function getEmail(): string
    {
        return $this->getStr('Email');
    }

    public function getLastName(): string
    {
        return $this->getStr('LastName');
    }

    public function getFirstName(): string
    {
        return $this->getStr('FirstName');
    }

    public function getMiddleName(): string
    {
        return $this->getStr('MiddleName');
    }
}
