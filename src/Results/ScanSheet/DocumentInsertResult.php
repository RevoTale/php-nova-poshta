<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results\ScanSheet;

abstract class DocumentInsertResult
{
    protected array $document;

    public function __construct(array $document)
    {
        $this->document = $document;
    }

    public function getRef(): ?string
    {
        return $this->document['Ref'] ?: null;
    }

    public function getNumber(): ?string
    {
        return $this->document['Number'] ?: null;
    }
}
