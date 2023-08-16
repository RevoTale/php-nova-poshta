<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet;

final readonly class DocumentInsertWarning extends DocumentInsertResult
{
    public function getWarning(): string
    {
        return $this->getField('Warning')->string();
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->getNullableField('ScanSheetNumber')->string();
    }
}
