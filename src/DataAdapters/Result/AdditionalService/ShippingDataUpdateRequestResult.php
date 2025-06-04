<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\AdditionalService;

use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use Grisaia\NovaPoshta\Exception\BadValueException;
use Grisaia\NovaPoshta\DataAdapters\Result;

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
     * @return ObjectNormalizer<BadValueException>
     */
    private function getData(): ObjectNormalizer
    {
        $objects = $this->container->getDataAsObjectList();
        if ([] === $objects) {
            throw new BadValueException(message:'No single object returned', key: 'Data', value: $objects);
        }

        return $objects[0];
    }
}
