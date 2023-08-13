<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Entities\Document;

use BladL\NovaPoshta\Decorators\Enums\CounterpartyPersonType;
use BladL\NovaPoshta\Decorators\Enums\DocumentStatusCode;
use BladL\NovaPoshta\Decorators\Enums\PaymentMethod;
use BladL\NovaPoshta\Decorators\Enums\ServiceType;
use BladL\NovaPoshta\Exception\DateParseException;
use BladL\NovaPoshta\Exception\QueryFailed\UnexpectedCounterpartyException;
use BladL\NovaPoshta\NovaPoshtaAPI;
use BladL\Time\Timestamp;
use DateTime;
use Exception;
use UnexpectedValueException;

final readonly class TrackingInformation extends Information
{
    public const DOC_TYPE_CARGO_RETURN = 'CargoReturn';
    public function getStatusCode(): DocumentStatusCode
    {
        return DocumentStatusCode::from($this->getField('StatusCode')->integer()
            ?? throw new UnexpectedValueException('Status code is null'));
    }

    public function getScanDateStr(): string
    {
        return $this->getField('DateScan')->string();
    }

    public function getNumber(): string
    {
        return $this->getField('Number')->string();
    }

    public function getDocumentWeight(): float
    {
        return $this->getField('DocumentWeight')->float();
    }

    /**
     * @throws UnexpectedCounterpartyException
     */
    public function getPayerType(): CounterpartyPersonType
    {
        $type = $this->getField('PayerType')->string();
        return CounterpartyPersonType::tryFrom($type) ?? throw new UnexpectedCounterpartyException($type);
    }

    public function getDocumentCost(): float
    {
        return $this->getField('DocumentCost')->float();
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
        return $this->getNullableField('RedeliverySum')->float();
    }

    public function getAfterpaymentSum(): ?float
    {
        return $this->getNullableField('AfterpaymentOnGoodsCost')->float();
    }

    public function getAmountToPay(): float
    {
        return $this->getField('AmountToPay')->float();
    }

    public function getAmountPaid(): float
    {
        return $this->getField('AmountPaid')->float();
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return PaymentMethod::from($this->getField('PaymentMethod')->string());
    }

    public function getOwnerDocumentType(): ?string
    {
        return $this->getNullableField('OwnerDocumentType')->string();
    }

    public function getOwnerDocumentNumber(): ?string
    {
        return $this->getNullableField('OwnerDocumentNumber')->string();
    }

    public function getLastCreatedOnTheBasisNumber(): ?string
    {
        return $this->getNullableField('LastCreatedOnTheBasisNumber')->string();
    }

    public function getLastCreatedOnTheBasisDocumentType(): ?string
    {
        return $this->getNullableField('LastCreatedOnTheBasisDocumentType')->string();

    }

    public function getTrackingUpdateTime(): ?Timestamp
    {
        $date = $this->getNullableField('TrackingUpdateDate')->string();
        return $date ? Timestamp::fromFormat('Y-m-d H:i:s', $date, NovaPoshtaAPI::getTimeZone()) : null;
    }

    public function getActualDeliveryTime(): ?Timestamp
    {
        $date = $this->getNullableField('ActualDeliveryDate')->string();
        return $date ? Timestamp::fromFormat('Y-m-d H:i:s', $date, NovaPoshtaAPI::getTimeZone()) : null;
    }

    public function getStatusDescription(): string
    {
        return $this->getField('Status')->string();
    }

    public function getDaysStorageCargo(): ?int
    {
        return $this->getNullableField('DaysStorageCargo')->integer();
    }

    public function getDaysStorageAmount(): ?int
    {
        return $this->getNullableField('StorageAmount')->integer();
    }

    public function isRedelivery(): ?bool
    {
        return $this->getNullableField('Redelivery')->bool();
    }

    public function getRedeliveryNumber(): ?string
    {
        return $this->getNullableField('RedeliveryNum')->string() ?: null;
    }

    public function getStoragePrice(): ?float
    {
        return $this->getNullableField('StoragePrice')->float();
    }

    public function getServiceType(): ServiceType
    {
        return ServiceType::from($this->getField('ServiceType')->string());
    }
}
