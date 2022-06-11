<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\Exceptions\NoSeatsAmountException;

/**
 * @internal
 */
abstract class Information
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @throws NoSeatsAmountException
     */
    public function getSeatsAmount(): int
    {
        $seats = $this->data['SeatsAmount'];
        if (empty($seats)) {
            throw new NoSeatsAmountException();
        }

        return (int) $seats;
    }
}
