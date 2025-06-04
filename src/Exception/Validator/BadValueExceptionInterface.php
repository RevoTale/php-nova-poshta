<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception\Validator;

use Throwable;

interface BadValueExceptionInterface extends Throwable
{
    public function getValidatedFieldKey(): string|null;

    public function getValidatedValue(): mixed;
}
