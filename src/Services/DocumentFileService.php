<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Enums\DocumentPrintType;
use Grisaia\NovaPoshta\Exception\QueryFailed\CurlException;
use Grisaia\NovaPoshta\Exception\QueryFailed\FileSaveException;

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
        if ($content === '' || $content === '0') {
            throw new FileSaveException('Empty content returned');
        }

        if (false === file_put_contents($destination, $content)) {
            throw new FileSaveException('Failed to save content in filesystem');
        }
    }
}
