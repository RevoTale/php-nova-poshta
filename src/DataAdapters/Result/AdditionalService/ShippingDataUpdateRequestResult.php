<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\AdditionalService;

use BladL\NovaPoshta\Normalizer\ObjectNormalizer;
use BladL\NovaPoshta\Exception\BadFieldValueException;
use BladL\NovaPoshta\DataAdapters\Result;

use function count;

final readonly class ShippingDataUpdateRequestResult extends Result
{
    public function getRequestNumber(): string
    {
        return $this->getData()->field('Number')->string();
    }

    public function getRequestRef(): string
    {
        return $this->getData()->field('Ref')->string();
    }

    /**
     * @return ObjectNormalizer<BadFieldValueException>
     */
    private function getData(): ObjectNormalizer
    {
        $objects = $this->container->getDataAsObjectList();
        if (0 === count($objects)) {
            throw new BadFieldValueException('No single object returned');
        }
        return $objects[0];
    }
}
