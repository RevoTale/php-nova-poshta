<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

use JetBrains\PhpStorm\Pure;
use Throwable;

final class JsonEncodeException extends QueryFailedException
{
    #[Pure]
 public function __construct(Throwable $prev)
 {
     parent::__construct('Не удалось форматировать параметры в JSON', 0, $prev);
 }
}
