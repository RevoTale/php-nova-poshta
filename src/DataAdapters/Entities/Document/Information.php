<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects\Document;

use BladL\NovaPoshta\Decorators\Enums\DocumentStatusCode;
use BladL\NovaPoshta\Exception\NoSeatsAmountException;
use BladL\NovaPoshta\DataAdapters\Entity;

/**
 * @internal
 */
abstract readonly class Information extends Entity
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
