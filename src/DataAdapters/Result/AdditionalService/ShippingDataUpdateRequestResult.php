<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\AdditionalService;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\Exception\BadFieldValueException;
use BladL\NovaPoshta\DataAdapters\Result;
use function count;

final readonly class ShippingDataUpdateRequestResult extends Result
{

    public function getRequestNumber(): string
    {
        return $this->getData()->string('Number');
    }

    public function getRequestRef(): string
    {
        return $this->getData()->string('Ref');
    }

    private function getData(): ObjectDecorator
    {
        $objects = $this->container->getObjectList();
        if (count($objects) === 0) {
            throw new BadFieldValueException('No single object returned');
        }
        return new ObjectDecorator($objects[0]);
    }
}
