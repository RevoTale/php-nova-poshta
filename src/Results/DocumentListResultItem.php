<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\Document\Information;
use BladL\NovaPoshta\Types\DocumentState;

final class DocumentListResultItem extends Information
{
    public function getRef(): string
    {
        return $this->data['Ref'];
    }

    public function isPrinted(): bool
    {
        return (bool) $this->data['Printed'];
    }

    public function getWeight(): float
    {
        return (float) $this->data['Weight'];
    }

    public function getDocumentNumber(): string
    {
        return (string) $this->data['IntDocNumber'];
    }

    public function getShippingCost(): float
    {
        return (float) $this->data['CostOnSite'];
    }

    public function getAssessedCost(): float
    {
        return (float) $this->data['Cost'];
    }

     public function getState(): DocumentState
     {
         return new DocumentState((int) $this->data['StateId']);
     }

    public function getStateName(): string
    {
        return $this->data['StateName'];
    }

    public function getScanSheetNumber(): ?string
    {
        $number = $this->data['ScanSheetNumber'];

        return $number ?: null;
    }
}
