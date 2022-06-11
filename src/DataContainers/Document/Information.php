<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\DataContainers\DataContainer;
use BladL\NovaPoshta\Exceptions\NoSeatsAmountException;

/**
 * @internal
 */
abstract class Information extends DataContainer
{
    /**
     * @throws NoSeatsAmountException
     */
    public function getSeatsAmount(): int
    {
        $seats = $this->data->nullOrInt('SeatsAmount');
        if (null === $seats || 0 === $seats) {
            throw new NoSeatsAmountException();
        }

        return $seats;
    }
}
