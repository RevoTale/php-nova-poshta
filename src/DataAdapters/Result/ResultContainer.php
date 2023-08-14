<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Entity;
use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Decorator\ValueDecorator;
use BladL\NovaPoshta\Exception\BadFieldValueException;
use Throwable;


final readonly class ResultContainer extends Entity
{
    /**
     * @throws BadFieldValueException
     */
    public function isSuccess(): bool
    {
        return $this->getField('success')->bool();
    }
    /**
     * @throws BadFieldValueException
     * @return ValueDecorator<BadFieldValueException>
     */
    public function getInfo(): ValueDecorator
    {
        return $this->getField('info');
    }
    /**
     * @throws BadFieldValueException
     * @return ValueDecorator<BadFieldValueException>
     */
    public function getData(): ValueDecorator
    {
        return $this->getField('data');
    }

    /**
     * @return list<ObjectDecorator<BadFieldValueException>>
     * @throws BadFieldValueException
     */
    public function getDataAsObjectList(): array
    {
        return $this->getData()->objectList();
    }

}
