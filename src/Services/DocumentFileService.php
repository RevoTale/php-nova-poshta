<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\Decorators\Enums\DocumentPrintType;
use BladL\NovaPoshta\Exception\QueryFailed\CurlException;
use BladL\NovaPoshta\Exception\QueryFailed\FileSaveException;

final readonly class DocumentFileService extends Service
{
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
