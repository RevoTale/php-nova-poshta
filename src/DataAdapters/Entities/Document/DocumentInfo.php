<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Document;

use Grisaia\NovaPoshta\DataAdapters\Enums\DocumentStatusCode;
use Grisaia\NovaPoshta\Exception\NoSeatsAmountException;
use Grisaia\NovaPoshta\DataAdapters\Entity;

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
