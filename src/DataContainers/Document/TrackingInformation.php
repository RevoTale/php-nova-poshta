<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Document;

use BladL\NovaPoshta\APIService;
use BladL\NovaPoshta\Exceptions\DateParseException;
use BladL\NovaPoshta\Types\DocumentState;
use DateTime;
use Exception;

final class TrackingInformation extends Information
{
    public function getStatus(): DocumentState
    {
        return new DocumentState((int) $this->data['StatusCode']);
    }

    public function getScanDateStr(): string
    {
        return $this->data['DateScan'];
    }

    public function getDocumentWeight(): float
    {
        return $this->data['DocumentWeight'];
    }

    public function getDocumentCost(): float
    {
        return (float) $this->data['DocumentCost'];
    }

    /**
     * @throws DateParseException
     */
    public function getScanDateTime(): DateTime
    {
        try {
            return new DateTime($this->getScanDateStr(), APIService::getTimeZone());
        } catch (Exception $e) {
            throw new DateParseException($e);
        }
    }

    public function getLastCreatedOnTheBasisNumber(): ?string
    {
        return $this->data['LastCreatedOnTheBasisNumber'] ?: null;
    }

    public function getStatusDescription(): string
    {
        return $this->data['Status'];
    }
}
