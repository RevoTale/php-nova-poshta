<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

use Awanturist\NovaPoshtaAPI\Exceptions\NoSeatsAmountException;

final class DocumentListResultItem
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getRef(): string
    {
        return $this->data['Ref'];
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
