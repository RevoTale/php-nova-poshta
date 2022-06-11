<?php
/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpUnused
 */
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Exceptions\QueryFailedException;
use BladL\NovaPoshta\Results\ScanSheet\DocumentsInsertResult;

/**
 * @internal
 */
class ScanSheetService extends Service
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
