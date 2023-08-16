<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result\ScanSheet;

final readonly class DocumentInsertError extends DocumentInsertResult
{
    public function getError(): string
    {
        return $this->getField('Error')->string();
    }
}
