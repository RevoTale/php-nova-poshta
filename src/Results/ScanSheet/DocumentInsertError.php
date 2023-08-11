<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results\ScanSheet;

final readonly class DocumentInsertError extends DocumentInsertResult
{
    public function getError(): string
    {
        return $this->document['Error'];
    }
}
