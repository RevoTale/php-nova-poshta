<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\Exceptions\NoSeatsAmountException;
use BladL\NovaPoshta\Types\DocumentStatusCode;

/**
 * @internal
 */
abstract readonly class Information extends DataContainer
{
    /**
     * @throws NoSeatsAmountException
     */
    public function getSeatsAmount(): int
    {
        $seats = $this->data->nullOrInt('SeatsAmount');
        if ($seats === null || $seats === 0) {
            throw new NoSeatsAmountException();
        }

        return $seats;
    }
    abstract public function getStatusCode(): DocumentStatusCode;
}
