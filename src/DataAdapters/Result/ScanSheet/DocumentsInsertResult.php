<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet;

use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Exception\BadValueException;

final readonly class DocumentsInsertResult extends Result
{
    /**
     * @return ObjectNormalizer<BadValueException>
     */
    private function getScanSheetData(): ObjectNormalizer
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
        return !in_array($this->getScanSheetRef(), [null, '', '0'], true);
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
            static fn (ObjectNormalizer $doc): \Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet\DocumentInsertSuccess => new DocumentInsertSuccess($doc),
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
            static fn (ObjectNormalizer $error): \Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet\DocumentInsertError => new DocumentInsertError($error),
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
            static fn (ObjectNormalizer $error): \Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet\DocumentInsertWarning => new DocumentInsertWarning($error),
            $data
        );
    }
}
