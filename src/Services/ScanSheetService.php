<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use BladL\NovaPoshta\DataAdapters\Result\ScanSheet\DocumentsInsertResult;

final readonly class ScanSheetService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function createScanSheetWithDocuments(string ...$documentNumbers): DocumentsInsertResult
    {
        return new DocumentsInsertResult(
            $this->api->fetch('ScanSheet', 'insertDocuments', [
                'DocumentRefs' => $documentNumbers,
            ])
        );
    }
}
