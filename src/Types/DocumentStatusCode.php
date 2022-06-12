<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

use function in_array;

enum DocumentStatusCode: int
{
    case WaitingForReceipt = 1;
    case Deleted = 2;
    case NotFound = 3;
    case InTheLocality = 4;
    case InTheLocalityLocalExpress = 41;
    case OnTheWayTo = 5;
    case InTheTargetLocality = 6;
    case Arrived = 7;
    case ArrivedAndUploaded = 8;
    case Received = 9;
    case ReceivedWaitForPayment = 10;
    case ReceivedBackwardPayment = 11;
    case CompanyPreparingShipping = 12;
    case OnTheWayToTheRecipientAddress = 101;
    case RefusedSentBack = 102; //Відмова одержувача (створено заявку на повернення)
    case Refused = 103;
    case AddressChanged = 104;
    case StoppedKeeping = 105;
    case ReceivedCreatedReturnDelivery = 106;
    case NotDeliveredNoReceiver = 111;
    case DeliveryTimeChanged = 112;
    public function isOneOf(DocumentStatusCode ...$codes): bool
    {
        return in_array($this, $codes, true);
    }

    public function documentExists(): bool
    {
        return $this->isOneOf(self::Deleted, self::NotFound);
    }

    public function getCode(): int
    {
        return $this->value;
    }

    public function isReceived(): bool
    {
        return $this->isOneOf(
            self::Received,
            self::ReceivedWaitForPayment,
            self::ReceivedBackwardPayment,
            self::ReceivedCreatedReturnDelivery,
        );
    }
}
