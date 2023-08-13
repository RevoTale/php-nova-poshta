<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\ScanSheet;

final readonly class DocumentInsertWarning extends DocumentInsertResult
{
    public function getWarning(): string
    {
        return $this->getField('Warning');
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->data->nullOrString('ScanSheetNumber');
    }
}
