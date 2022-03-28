<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\Exceptions\DateParseException;
use BladL\NovaPoshta\Exceptions\UnexpectedCounterpartyKind;
use BladL\NovaPoshta\NovaPoshtaAPI;
use BladL\NovaPoshta\NovaPoshtaTimeZone;
use BladL\NovaPoshta\Types\CounterpartyKind;
use BladL\NovaPoshta\Types\DocumentState;
use BladL\Time\Moment;
use DateTime;
use Exception;

final class TrackingInformation extends Information
{
    public function getStatus(): DocumentState
    {
        return new DocumentState((int)$this->data['StatusCode']);
    }

    public function getScanDateStr(): string
    {
        return $this->data['DateScan'];
    }

    public function getNumber(): string
    {
        return $this->data['Number'];
    }

    public function getDocumentWeight(): float
    {
        return $this->data['DocumentWeight'];
    }

    /**
     * @throws UnexpectedCounterpartyKind
     */
    public function getPayerType(): CounterpartyKind
    {
        return CounterpartyKind::fromString($this->data['PayerType']);
    }

    public function getDocumentCost(): float
    {
        return (float)$this->data['DocumentCost'];
    }

    /**
     * @throws DateParseException
     */
    public function getScanDateTime(): DateTime
    {
        try {
            return new DateTime($this->getScanDateStr(), NovaPoshtaAPI::getTimeZone());
        } catch (Exception $e) {
            throw new DateParseException($e);
        }
    }

    public function getRedeliverySum(): float
    {
        return (float)$this->data['RedeliverySum'];
    }

    public function getAfterpaymentSum(): float
    {
        return (float)$this->data['AfterpaymentOnGoodsCost'];
    }

    public function getAmountToPay(): float
    {
        return (float)$this->data['AmountToPay'];
    }

    public function getAmountPaid(): float
    {
        return (float)$this->data['AmountPaid'];
    }

    public function getOwnerDocumentType(): ?string
    {
        return $this->data['OwnerDocumentType'] ?: null;
    }

    public function getLastCreatedOnTheBasisNumber(): ?string
    {
        return $this->data['LastCreatedOnTheBasisNumber'] ?: null;
    }

    public function getTrackingUpdateTime(): ?Moment
    {
        $date = $this->data['TrackingUpdateDate'];
        return $date ? (new NovaPoshtaTimeZone())->timeFromFormat('Y-m-d H:i:s', $date) : null;
    }

    public function getActualDeliveryTime(): ?Moment
    {
        $date = $this->data['ActualDeliveryDate'];
        return $date ? (new NovaPoshtaTimeZone())->timeFromFormat('Y-m-d H:i:s', $date) : null;
    }

    public function getStatusDescription(): string
    {
        return $this->data['Status'];
    }

    public function getDaysStorageCargo():?int {
        $days = $this->data['DaysStorageCargo'];
        return $days?(int)$days:null;
    }

    public function isRedelivery():?bool {
        $yes = $this->data['Redelivery'];
        return '' === $yes ?null:(bool)$yes;
    }

    public function getRedeliveryNumber():?string {
        $num = $this->data['RedeliveryNum'];
        return $num?(string)$num:null;
    }

    public function getStoragePrice(): ?float
    {
        $price = $this->data['StoragePrice'];
        return $price ? (float)$price : null;
    }
}
