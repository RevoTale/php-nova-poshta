<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

final class CounterpartyKind
{
    private string $type;

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function sender(): self
    {
        return new self('Sender');
    }

    public static function recipient(): self
    {
        return new self('Recipient');
    }

    public static function thirdPerson(): self
    {
        return new self('ThirdPerson');
    }

    public function toString(): string
    {
        return $this->type;
    }
}
