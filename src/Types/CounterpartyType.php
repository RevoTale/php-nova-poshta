<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

use JetBrains\PhpStorm\Pure;
use UnexpectedValueException;
use function in_array;

final class CounterpartyType
{
    private string $type;
    private const PRIVATE_PERSON = 'PrivatePerson';
    private const ORGANIZATION = 'Organization';

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function fromString(string $type): self
    {
        if (in_array($type, [self::PRIVATE_PERSON, self::ORGANIZATION], true)) {
            return new self($type);
        }
        throw new UnexpectedValueException($type);
    }

    #[Pure]
    public static function privatePerson(): self
    {
        return new self(self::PRIVATE_PERSON);
    }

    #[Pure]
    public static function organization(): self
    {
        return new self(self::ORGANIZATION);
    }

    public function toString(): string
    {
        return $this->type;
    }
}
