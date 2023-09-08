<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception;

use Grisaia\NovaPoshta\Exception\Validator\BadValueExceptionInterface;
use UnexpectedValueException;

class BadValueException extends UnexpectedValueException implements BadValueExceptionInterface
{
    public function __construct(string $message, private readonly mixed $value, private readonly ?string $key)
    {
        parent::__construct($message);
    }
    public function getValidatedFieldKey(): ?string
    {
        return $this->key;
    }
    public function getValidatedValue(): mixed
    {
        return $this->value;
    }
}
