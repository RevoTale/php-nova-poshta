<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Normalizer\ObjectNormalizer;

final readonly class DocumentListResult extends Result
{
    /**
     * @return list<DocumentListResultItem>
     */
    public function getDocuments(): array
    {
        return array_map(static fn (ObjectNormalizer $doc) => new DocumentListResultItem($doc), $this->container->getDataAsObjectList());
    }
}
