<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\Document\Information;
use BladL\NovaPoshta\DataContainers\Traits\Ref;
use BladL\NovaPoshta\Types\DocumentStatusCode;
use UnexpectedValueException;

final class DocumentListResultItem extends Information
{
    use Ref;

    public function isPrinted(): bool
    {
        return $this->data->bool('Printed');
    }

    public function getWeight(): float
    {
        return $this->data->float('Weight');
    }

    public function getDocumentNumber(): string
    {
        return $this->data->string('IntDocNumber');
    }

    public function getShippingCost(): float
    {
        return $this->data->float('CostOnSite');
    }

    public function getAssessedCost(): float
    {
        return $this->data->float('Cost');
    }

    public function getStatusCode(): DocumentStatusCode
    {
        return DocumentStatusCode::from(
            $this->data->nullOrInt('StateId') ?? throw new UnexpectedValueException('StateId is null')
        );
    }

    public function getStateName(): string
    {
        return $this->data->string('StateName');
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->data->nullOrString('ScanSheetNumber');
    }
}
