<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception;

final class BadFieldValueException extends BadValueException
{
    public function __construct(string $message, private string $key)
    {
        parent::__construct($message);
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
