<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;

final readonly class DocumentInsertWarning extends DocumentInsertResult
{
    public function getWarning(): string
    {
        return $this->data->string('Warning');
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->data->nullOrString('ScanSheetNumber');
    }
}
