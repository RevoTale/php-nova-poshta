<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Entities\Document;

use Grisaia\NovaPoshta\DataAdapters\Entities\Traits\Ref;
use Grisaia\NovaPoshta\Decorators\Enums\DocumentStatusCode;
use UnexpectedValueException;

final readonly class DocumentListItem extends DocumentInfo
{
    use Ref;

    public function isPrinted(): bool
    {
        return $this->getField('Printed')->bool();
    }

    public function getWeight(): float
    {
        return $this->getField('Weight')->float();
    }

    public function getDocumentNumber(): string
    {
        return $this->getField('IntDocNumber')->string();
    }

    public function getShippingCost(): float
    {
        return $this->getField('CostOnSite')->float();
    }

    public function getAssessedCost(): float
    {
        return $this->getField('Cost')->float();
    }

    public function getStatusCode(): DocumentStatusCode
    {
        return DocumentStatusCode::from(
            $this->getNullableField('StateId')->integer() ?? throw new UnexpectedValueException('StateId is null')
        );
    }

    public function getStateName(): string
    {
        return $this->getField('StateName')->string();
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->getNullableField('ScanSheetNumber')->string();
    }
}
