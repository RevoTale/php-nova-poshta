<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\DataContainers\Document\TrackingInformation;
use BladL\NovaPoshta\Exceptions\DocumentNotExists;
use BladL\NovaPoshta\Exceptions\QueryFailedException;
use BladL\NovaPoshta\Results\Document\TrackingResult;
use BladL\NovaPoshta\Results\DocumentListResult;
use BladL\NovaPoshta\Results\DocumentListResultItem;

class DocumentService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function getDocument(string $documentNumber): DocumentListResultItem
    {
        return (
        new DocumentListResult(
            $this->api->fetch('InternetDocument', 'getDocumentList', [
                'IntDocNumber' => $documentNumber,
            ])
        )
        )->getDocuments()[0];
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
    public function trackDocument(string $documentNumber): TrackingInformation
    {
        $tracking = (new TrackingResult(
            $this->api->fetch('TrackingDocument', 'getStatusDocuments', [
                'Documents' => [
                    [
                        'DocumentNumber' => $documentNumber,
                        'Phone' => '',
                    ],
                ],
            ])
        ))->getDocumentsTracking()[0];
        if ($tracking->getStatus()->documentExists()) {
            throw new DocumentNotExists($tracking);
        }

        return $tracking;
    }

    public function getDocumentNumByBarcode(string $barcode): string
    {
        return substr($barcode, 0, 14);
    }
}
