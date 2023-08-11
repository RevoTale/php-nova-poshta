<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;

use BladL\NovaPoshta\Results\Result;
use UnexpectedValueException;

final readonly class DocumentsInsertResult extends Result
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
     * @return list<DocumentInsertSuccess>
     */
    public function getSuccessDocuments(): array
    {
        $data =  $this->getScanSheetData()['Success'];
        if (!array_is_list($data)) {
            throw new UnexpectedValueException('Bad Success data');
        }
        return array_map(
            static fn (array $doc) => new DocumentInsertSuccess($doc),
            $data
        );
    }

    /**
     * @return list<DocumentInsertError>
     */
    public function getDocumentErrors(): array
    {
        $data =  $this->getScanSheetData()['Data']['Errors'];
        if (!array_is_list($data)) {
            throw new UnexpectedValueException('Bad Success data');
        }
        return array_map(
            static fn (array $error) => new DocumentInsertError($error),
            $data
        );
    }

    /**
     * @return list<DocumentInsertWarning>
     */
    public function getWarnings(): array
    {
        $data =   $this->getScanSheetData()['Data']['Warnings'];
        if (!array_is_list($data)) {
            throw new UnexpectedValueException('Bad Success data');
        }
        return array_map(
            static fn (array $error) => new DocumentInsertWarning($error),
          $data
        );
    }
}
