<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

final class DocumentListResult extends Result
{
    /**
     * @return DocumentListResultItem[]
     */
    public function getDocuments(): array
    {
        return array_map(static fn (array $doc) => new DocumentListResultItem($doc), $this->container->getData());
    }
}
