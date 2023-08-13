<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\AdditionalService;

use BladL\NovaPoshta\DataContainers\DataRepository;
use BladL\NovaPoshta\Exceptions\BadFieldValueException;
use BladL\NovaPoshta\Results\Result;
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

    private function getData(): DataRepository
    {
        $objects = $this->container->getObjectList();
        if (count($objects) === 0) {
            throw new BadFieldValueException('No single object returned');
        }
        return new DataRepository($objects[0]);
    }
}
