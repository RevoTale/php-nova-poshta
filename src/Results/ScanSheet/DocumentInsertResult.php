<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;

/**
 * @internal
 */
abstract readonly class DocumentInsertResult
{

    public function __construct(protected array $document)
    {
    }

    public function getRef(): string
    {
        return $this->document['Ref'];
    }

    public function getNumber(): ?string
    {
        return $this->document['Number'] ?: null;
    }
}
