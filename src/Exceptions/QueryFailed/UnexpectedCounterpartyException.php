<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions\QueryFailed;

use UnexpectedValueException;

/**
 * Thrown in case bad NovaPoshta response, normally this  should not happen
 */
final class UnexpectedCounterpartyException extends UnexpectedValueException
{
    public function __construct(string $type)
    {
        parent::__construct("Unexpected counterparty '$type'");
    }
}
