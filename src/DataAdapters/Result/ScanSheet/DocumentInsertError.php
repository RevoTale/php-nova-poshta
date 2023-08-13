<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result\ScanSheet;

final readonly class DocumentInsertError extends DocumentInsertResult
{
    public function getError(): string
    {
        return $this->data->string('Error');
    }
}
