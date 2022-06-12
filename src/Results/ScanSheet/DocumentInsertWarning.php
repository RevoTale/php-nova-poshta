<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;


final class DocumentInsertWarning extends DocumentInsertResult
{
    public function getWarning(): string
    {
        return $this->document['Warning'];
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->document['ScanSheetNumber'] ?? null;
    }
}
