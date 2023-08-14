<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\DataAdapters\Result;
use BladL\NovaPoshta\Decorator\ObjectDecorator;

final readonly class DocumentListResult extends Result
{
    /**
     * @return list<DocumentListResultItem>
     */
    public function getDocuments(): array
    {
        return array_map(static fn (ObjectDecorator $doc) => new DocumentListResultItem($doc), $this->container->getDataAsObjectList());
    }
}
