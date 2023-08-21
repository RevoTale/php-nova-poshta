<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\Document;

use Grisaia\NovaPoshta\DataAdapters\Entities\Document\DocumentListItem;
use Grisaia\NovaPoshta\DataAdapters\Result;
use Grisaia\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class DocumentListResult extends Result
{
    /**
     * @return list<DocumentListItem>
     */
    public function getDocuments(): array
    {
        return array_map(
            static fn (ObjectNormalizer $doc) => new DocumentListItem($doc),
            $this->container->getDataAsObjectList()
        );
    }
}
