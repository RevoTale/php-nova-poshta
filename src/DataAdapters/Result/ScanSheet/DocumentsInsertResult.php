<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\ScanSheet;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\DataAdapters\Result;

final readonly class DocumentsInsertResult extends Result
{
    protected function getScanSheetData(): ObjectDecorator
    {
        return new ObjectDecorator($this->container->getObjectList()[0]);
    }

    public function getScanSheetRef(): ?string
    {
        return $this->getScanSheetData()->nullOrString('Ref');
    }

    /**
     * Check whether a scan sheet exists or created.
     */
    public function isScanSheetOk(): bool
    {
        return !empty($this->getScanSheetRef());
    }

    public function getScanSheetNumber(): ?string
    {
        return $this->getScanSheetData()->nullOrString('Number');
    }

    /**
     * @return list<DocumentInsertSuccess>
     */
    public function getSuccessDocuments(): array
    {
        $data =  $this->getScanSheetData()->arrayList('Success');
        /**
         * @var list<array<string,mixed>> $data
         */
        return (array_map(
            static fn (array $doc) => new DocumentInsertSuccess($doc),
            $data
        ));
    }

    /**
     * @return list<DocumentInsertError>
     */
    public function getDocumentErrors(): array
    {
        $data =  (new ObjectDecorator($this->getScanSheetData()->arrayObject('Data')))->arrayList('Errors');
        /**
         * @var list<array<string,mixed>> $data
         */
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
        $data =  (new ObjectDecorator($this->getScanSheetData()->arrayObject('Data')))->arrayList('Warnings');
        /**
         * @var list<array<string,mixed>> $data
         */
        return array_map(
            static fn (array $error) => new DocumentInsertWarning($error),
          $data
        );
    }
}
