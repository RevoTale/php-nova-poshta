<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\Exception\BadFieldValueException;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;
use BladL\NovaPoshta\Normalizer\ValueNormalizer;


final readonly class ResponseContainer extends Entity
{
    /**
     * @throws BadFieldValueException
     */
    public function isSuccess(): bool
    {
        return $this->getField('success')->bool();
    }
    /**
     * @return ValueNormalizer<BadFieldValueException>
     * @throws BadFieldValueException
     */
    public function getInfo(): ValueNormalizer
    {
        return $this->getField('info');
    }
    /**
     * @return ValueNormalizer<BadFieldValueException>
     * @throws BadFieldValueException
     */
    public function getData(): ValueNormalizer
    {
        return $this->getField('data');
    }

    /**
     * @return list<ObjectNormalizer<BadFieldValueException>>
     * @throws BadFieldValueException
     */
    public function getDataAsObjectList(): array
    {
        return $this->getData()->objectList();
    }

}
