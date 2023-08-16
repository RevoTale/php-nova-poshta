<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Entities\Document\DocumentListItem;
use Grisaia\NovaPoshta\DataAdapters\Entities\Document\TrackingItem;
use Grisaia\NovaPoshta\DataAdapters\Result\Document\DocumentListResult;
use Grisaia\NovaPoshta\DataAdapters\Result\Document\TrackingResult;
use Grisaia\NovaPoshta\Exception\DocumentNotExists;
use Grisaia\NovaPoshta\Exception\DocumentNotFoundException;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;

final readonly class DocumentService extends Service
{
    /**
     * @throws QueryFailedException|DocumentNotFoundException
     */
    public function getDocument(string $documentNumber): DocumentListItem
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
    public function getDocumentList(int $page, int $limit): DocumentListResult
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
    public function trackDocument(string $documentNumber, string $phone = ''): TrackingItem
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


}
