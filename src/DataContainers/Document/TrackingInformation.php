<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\Exceptions\DateParseException;
use BladL\NovaPoshta\Exceptions\QueryFailed\UnexpectedCounterpartyException;
use BladL\NovaPoshta\NovaPoshtaAPI;
use BladL\NovaPoshta\Types\CounterpartyPersonType;
use BladL\NovaPoshta\Types\DocumentStatusCode;
use BladL\NovaPoshta\Types\PaymentMethod;
use BladL\NovaPoshta\Types\ServiceType;
use BladL\Time\Timestamp;
use BladL\Time\TimeZone;
use DateTime;
use Exception;
use UnexpectedValueException;

final class TrackingInformation extends Information
{
    public function getStatusCode(): DocumentStatusCode
    {
        return DocumentStatusCode::from($this->data->nullOrInt('StatusCode')
            ?? throw new UnexpectedValueException('Status code is null'));
    }

    public function getScanDateStr(): string
    {
        return $this->data->string('DateScan');
    }

    public function getNumber(): string
    {
        return $this->data->string('Number');
    }

    public function getDocumentWeight(): float
    {
        return $this->data->float('DocumentWeight');
    }

    /**
     * @throws UnexpectedCounterpartyException
     */
    public function getPayerType(): CounterpartyPersonType
    {
        $type = $this->data->string('PayerType');
        return CounterpartyPersonType::tryFrom($type) ?? throw new UnexpectedCounterpartyException($type);
    }

    public function getDocumentCost(): float
    {
        return $this->data->float('DocumentCost');
    }

    /**
     * @throws DateParseException
     */
    public function getScanDateTime(): DateTime
    {
        try {
            return new DateTime($this->getScanDateStr(), NovaPoshtaAPI::getTimeZone()->toNativeDateTimeZone());
        } catch (Exception $e) {
            throw new DateParseException($e);
        }
    }

    public function getRedeliverySum(): ?float
    {
        return $this->data->nullOrFloat('RedeliverySum');
    }

    public function getAfterpaymentSum(): ?float
    {
        return $this->data->nullOrFloat('AfterpaymentOnGoodsCost');
    }

    public function getAmountToPay(): float
    {
        return $this->data->float('AmountToPay');
    }

    public function getAmountPaid(): float
    {
        return $this->data->float('AmountPaid');
    }

    public function getPaymentMethod():PaymentMethod {
        return PaymentMethod::from($this->data->string('PaymentMethod'));
    }

    public function getOwnerDocumentType(): ?string
    {
        return $this->data->nullOrString('OwnerDocumentType');
    }
    public function getOwnerDocumentNumber(): ?string
    {
        return $this->data->nullOrString('OwnerDocumentNumber');
    }

    public function getLastCreatedOnTheBasisNumber(): ?string
    {
        return $this->data->nullOrString('LastCreatedOnTheBasisNumber');
    }

    public function getTrackingUpdateTime(): ?Timestamp
    {
        $date = $this->data->nullOrString('TrackingUpdateDate');
        return $date ? Timestamp::fromFormat('Y-m-d H:i:s', $date, NovaPoshtaAPI::getTimeZone()) : null;
    }

    public function getActualDeliveryTime(): ?Timestamp
    {
        $date = $this->data->nullOrString('ActualDeliveryDate');
        return $date ? Timestamp::fromFormat('Y-m-d H:i:s', $date, NovaPoshtaAPI::getTimeZone()) : null;
    }

    public function getStatusDescription(): string
    {
        return $this->data->string('Status');
    }

    public function getDaysStorageCargo(): ?int
    {
        return $this->data->nullOrInt('DaysStorageCargo');
    }

    public function getDaysStorageAmount(): ?int
    {
        return $this->data->nullOrInt('StorageAmount');
    }

    public function isRedelivery(): ?bool
    {
        return $this->data->nullOrBool('Redelivery');
    }

    public function getRedeliveryNumber(): ?string
    {
        return $this->data->nullOrString('RedeliveryNum') ?: null;
    }

    public function getStoragePrice(): ?float
    {
        return $this->data->nullOrFloat('StoragePrice');
    }

    public function getServiceType(): ServiceType
    {
        return ServiceType::from($this->data->string('ServiceType'));
    }
}
