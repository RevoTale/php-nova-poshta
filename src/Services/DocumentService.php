<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Decorators\Enums\DocumentPrintType;
use BladL\NovaPoshta\DataAdapters\Entities\Document\TrackingInformation;
use BladL\NovaPoshta\Exception\DocumentNotExists;
use BladL\NovaPoshta\Exception\DocumentNotFoundException;
use BladL\NovaPoshta\Exception\QueryFailed\CurlException;
use BladL\NovaPoshta\Exception\QueryFailed\FileSaveException;
use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\DataAdapters\Result\Document\TrackingResult;
use BladL\NovaPoshta\DataAdapters\Result\DocumentListResult;
use BladL\NovaPoshta\DataAdapters\Result\DocumentListResultItem;

final readonly class DocumentService extends Service
{
    /**
     * @throws QueryFailedException|DocumentNotFoundException
     */
    public function getDocument(string $documentNumber): DocumentListResultItem
    {
        return (
            new DocumentListResult(
                $this->api->fetch('InternetDocument', 'getDocumentList', [
                    'IntDocNumber' => $documentNumber,
                ])
            )
            )->getDocuments()[0] ?? throw new DocumentNotFoundException();
    }

    /**
     * @throws QueryFailedException
     */
    public function getDocuments(int $page, int $limit): DocumentListResult
    {
        return
            new DocumentListResult(
                $this->api->fetch('InternetDocument', 'getDocumentList', [
                    'Page' => $page,
                    'Limit' => $limit,
                ])
            );
    }

    /**
     * @throws QueryFailedException
     * @throws DocumentNotExists
     */
    public function trackDocument(string $documentNumber, string $phone = ''): TrackingInformation
    {
        $tracking = (new TrackingResult(
            $this->api->fetch('TrackingDocument', 'getStatusDocuments', [
                'Documents' => [
                    [
                        'DocumentNumber' => $documentNumber,
                        'Phone' => $phone,
                    ],
                ],
            ])
        ))->getDocumentsTracking()[0];
        if ($tracking->getStatusCode()->documentExists()) {
            throw new DocumentNotExists($tracking);
        }

        return $tracking;
    }

    public function getDocumentNumByBarcode(string $barcode): string
    {
        return substr($barcode, 0, 14);
    }

    /**
     * @param list<string> $documents
     * @throws CurlException
     * @throws FileSaveException
     */
    public function saveDocumentsFile(
        string $destination,
        array $documents,
        DocumentPrintType $type,
        int $timeout = 5
    ): void {
        $content = $this->api->fetchFile('orders/printMarking85x85/orders/'
            . implode(',', $documents)
            . '/type/' . $type->value, $timeout);
        if (empty($content)) {
            throw new FileSaveException('Empty content returned');
        }
        if (false === file_put_contents($destination, $content)) {
            throw new FileSaveException('Failed to save content in filesystem');
        }
    }
}
