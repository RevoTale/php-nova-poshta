<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

final readonly class DocumentListResult extends Result
{
    /**
     * @return list<DocumentListResultItem>
     */
    public function getDocuments(): array
    {
        return array_map(static fn (array $doc) => new DocumentListResultItem($doc), $this->container->getObjectList());
    }
}
