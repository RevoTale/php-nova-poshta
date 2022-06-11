<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

/**
 * Counterparty person type
 */
enum CounterpartyPersonType: string
{
    private const Sender = 'Sender';
    private const Recipient = 'Recipient';
    private const ThirdPerson = 'ThirdPerson';
    public function toString(): string
    {
        return $this->value;
    }
}
