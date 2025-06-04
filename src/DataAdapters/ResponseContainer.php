<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters;

use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use Grisaia\NovaPoshta\Normalizer\ValueNormalizer;

final readonly class ResponseContainer extends Entity
{
    /**
     * @throws BadValueException
     */
    public function isSuccess(): bool
    {
        return $this->getField('success')->bool();
    }

    /**
     * @return ValueNormalizer<BadValueException>
     * @throws BadValueException
     */
    public function getInfo(): ValueNormalizer
    {
        return $this->getField('info');
    }

    /**
     * @return ValueNormalizer<BadValueException>
     * @throws BadValueException
     */
    public function getData(): ValueNormalizer
    {
        return $this->getField('data');
    }

    /**
     * @return list<ObjectNormalizer<BadValueException>>
     * @throws BadValueException
     */
    public function getDataAsObjectList(): array
    {
        return $this->getData()->objectList();
    }

}
