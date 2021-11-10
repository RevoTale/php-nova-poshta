<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

use JetBrains\PhpStorm\Pure;
use UnexpectedValueException;

final class CounterpartyType
{
    private string $type;
    private const PRIVATE_PERSON = 'PrivatePerson';

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function fromString(string $type): self
    {
        if (self::PRIVATE_PERSON === $type) {
            return new self($type);
        }
        throw new UnexpectedValueException($type);
    }

    #[Pure]
    public static function privatePerson(): self
    {
        return new self(self::PRIVATE_PERSON);
    }

    public function toString(): string
    {
        return $this->type;
    }
}
