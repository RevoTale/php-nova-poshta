<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI;

use Awanturist\NovaPoshtaAPI\DataContainers\Document\TrackingInformation;
use Awanturist\NovaPoshtaAPI\Exceptions\DocumentNotExists;
use Awanturist\NovaPoshtaAPI\Exceptions\QueryFailedException;
use Awanturist\NovaPoshtaAPI\Results\CityFinderResult;
use Awanturist\NovaPoshtaAPI\Results\Document\TrackingResult;
use Awanturist\NovaPoshtaAPI\Results\DocumentListResult;
use Awanturist\NovaPoshtaAPI\Results\DocumentListResultItem;
use Awanturist\NovaPoshtaAPI\Results\ScanSheet\DocumentsInsertResult;

class APIService extends APIFetcher
{
    /**
     * @throws QueryFailedException
     */
    public function findCityByString(string $city): CityFinderResult
    {
        return new CityFinderResult(
            $this->execute('Address', 'getCities', [
                'FindByString' => $city,
            ])
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function createScanSheetWithDocuments(string ...$documentNumbers): DocumentsInsertResult
    {
        return new DocumentsInsertResult(
            $this->execute('ScanSheet', 'insertDocuments', [
                'DocumentRefs' => $documentNumbers,
            ])
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function getDocument(string $documentNumber): DocumentListResultItem
    {
        return (
        new DocumentListResult(
            $this->execute('InternetDocument', 'getDocumentList', [
                'IntDocNumber' => $documentNumber,
            ])
        )
        )->getDocuments()[0];
    }

    /**
     * @throws QueryFailedException
     * @throws DocumentNotExists
     */
    public function trackDocument(string $documentNumber): TrackingInformation
    {
        $tracking = (new TrackingResult(
            $this->execute('TrackingDocument', 'getStatusDocuments', [
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
}
