<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Document;

use BladL\NovaPoshta\Decorators\Enums\DocumentStatusCode;
use BladL\NovaPoshta\Exception\NoSeatsAmountException;
use BladL\NovaPoshta\DataAdapters\Entity;

/**
 * @internal
 */
abstract readonly class DocumentInfo extends Entity
{
    /**
     * @throws NoSeatsAmountException
     */
    public function getSeatAmount(): int
    {
        $seats = $this->getNullableField('SeatsAmount')->integer();
        if (null === $seats || 0 === $seats) {
            throw new NoSeatsAmountException();
        }

        return $seats;
    }
    abstract public function getStatusCode(): DocumentStatusCode;
}
