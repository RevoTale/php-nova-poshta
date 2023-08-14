<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\ScanSheet;

use BladL\NovaPoshta\Decorator\ObjectDecorator;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Exception\BadFieldValueException;

final readonly class DocumentsInsertResult extends Result
{
    /**
     * @return ObjectDecorator<BadFieldValueException>
     */
    protected function getScanSheetData(): ObjectDecorator
    {
        return $this->container->getDataAsObjectList()[0];
    }

    public function getScanSheetRef(): ?string
    {
        return $this->getScanSheetData()->nullableField('Ref')->string();
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
        return $this->getScanSheetData()->nullableField('Number')->string();
    }

    /**
     * @return list<DocumentInsertSuccess>
     */
    public function getSuccessDocuments(): array
    {
        $data =  $this->getScanSheetData()->field('Success')->objectList();
        return (array_map(
            static fn (ObjectDecorator $doc) => new DocumentInsertSuccess($doc),
            $data
        ));
    }

    /**
     * @return list<DocumentInsertError>
     */
    public function getDocumentErrors(): array
    {
        $data =  (($this->getScanSheetData()->field('Data')->object()))->field('Errors')->objectList();
        return array_map(
            static fn (ObjectDecorator $error) => new DocumentInsertError($error),
            $data
        );
    }

    /**
     * @return list<DocumentInsertWarning>
     */
    public function getWarnings(): array
    {
        $data =  (($this->getScanSheetData()->field('Data')->object()))->field('Warnings')->objectList();
        return array_map(
            static fn (ObjectDecorator $error) => new DocumentInsertWarning($error),
            $data
        );
    }
}
