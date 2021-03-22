<?php
declare(strict_types=1);


namespace Awanturist\NovaPoshtaAPI\Results\ScanSheet;


class DocumentInsertResult
{
    protected object $document;

    public function __construct(object $document)
    {
        $this->document = $document;
    }

    public function getRef(): string
    {
        return $this->document->Ref;
    }

    public function getNumber(): string
    {
        return $this->document->Number;
    }
}
