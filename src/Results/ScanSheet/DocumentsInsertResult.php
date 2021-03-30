<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results\ScanSheet;

use Awanturist\NovaPoshtaAPI\Results\Result;

final class DocumentsInsertResult extends Result
{
    protected function getScanSheetData(): array
    {
        return $this->container->getData()[0];
    }

    public function getScanSheetRef(): ?string
    {
        return $this->getScanSheetData()['Ref'] ?: null;
    }

    /**
     * Check whether scan sheet exists or created.
     */
    public function isScanSheetOk(): bool
    {
        return !empty($this->getScanSheetRef());
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->getScanSheetData()['Number'] ?: null;
    }

    /**
     * @return DocumentInsertSuccess[]
     */
    public function getSuccessDocuments(): array
    {
        return array_map(
            static fn (array $doc) => new DocumentInsertSuccess($doc),
            $this->getScanSheetData()['Success']
        );
    }

    /**
     * @return DocumentInsertError[]
     */
    public function getDocumentErrors(): array
    {
        return array_map(
            static fn (array $error) => new DocumentInsertError($error),
            $this->getScanSheetData()['Data']['Errors']
        );
    }

    /**
     * @return DocumentInsertWarning[]
     */
    public function getWarnings(): array
    {
        return array_map(
            static fn (array $error) => new DocumentInsertWarning($error),
            $this->getScanSheetData()['Data']['Warnings']
        );
    }
}
