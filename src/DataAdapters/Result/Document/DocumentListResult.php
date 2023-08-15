<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\Document;

use BladL\NovaPoshta\DataAdapters\Entities\Document\DocumentListItem;
use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class DocumentListResult extends Result
{
    /**
     * @return DocumentListItem
     */
    public function getDocuments(): array
    {
        return array_map(static fn (ObjectNormalizer $doc) => new DocumentListItem($doc), $this->container->getDataAsObjectList());
    }
}
