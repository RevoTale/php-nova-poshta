<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

final class UnexpectedCounterpartyKind extends Exception
{
    #[Pure]
    public function __construct(string $type)
    {
        parent::__construct("Неожиданный тип контрагента: '$type'");
    }
}
