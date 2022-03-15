<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Exception;

final class UnexpectedCounterpartyKind extends Exception
{
    public function __construct(string $type)
    {
        parent::__construct("Неожиданный тип контрагента: '$type'");
    }
}
