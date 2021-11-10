<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

use function in_array;
use JetBrains\PhpStorm\Pure;

final class DocumentState
{
    public const WAITING_FOR_RECEIPT = 1;
    public const DELETED = 2;
    public const NOT_FOUND = 3;
    public const IN_THE_LOCALITY = 4;
    public const IN_THE_LOCALITY_LOCAL_EXPRESS = 41;
    public const ON_THE_WAY_TO = 5;
    public const IN_THE_TARGET_LOCALITY = 6;
    public const ARRIVED = [7, 8];
    public const RECEIVED = 9;
    public const RECEIVED_WAIT_FOR_PAYMENT = 10;
    public const RECEIVED_BACKWARD_PAYMENT = 11;
    public const COMPANY_PREPARING_SHIPPING = 12;
    public const ON_THE_WAY_TO_ADDRESS = 101;
    public const REFUSAL = [102, 103, 108];
    public const ADDRESS_CHANGED = 104;
    public const STOPPED_KEEPING = 105;
    public const RECEIVED_AND_CREATE_BACKWARD_SHIPMENT = 106;
    public const NOT_DELIVERED_NO_RECEIVER = 111;
    public const DELIVERY_TIME_CHANGED = 112;
    private int $state;

    public function __construct(int $state)
    {
        $this->state = $state;
    }

    public function isOneOf(int ...$codes): bool
    {
        return in_array($this->state, $codes, true);
    }

    #[Pure]
     public function documentExists(): bool
     {
         return $this->isOneOf(self::DELETED, self::NOT_FOUND);
     }

    public function getCode(): int
    {
        return $this->state;
    }

    public function isReceived(): bool
    {
        return in_array($this->state, [
            self::RECEIVED,
            self::RECEIVED_WAIT_FOR_PAYMENT,
            self::RECEIVED_BACKWARD_PAYMENT,
            self::RECEIVED_AND_CREATE_BACKWARD_SHIPMENT,
        ], true);
    }
}
