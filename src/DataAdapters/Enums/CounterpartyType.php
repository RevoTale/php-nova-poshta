<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Enums;

/**
 * CounterpartyListItem type
 */
enum CounterpartyType: string
{
    case PrivatePerson = 'PrivatePerson';
    case Organization = 'Organization';
    public function toString(): string
    {
        return $this->value;
    }
}
