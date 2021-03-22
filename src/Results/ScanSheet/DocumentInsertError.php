<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results\ScanSheet;

final class DocumentInsertError extends DocumentInsertResult
{
    public function getError(): string
    {
        return $this->document['Error'];
    }
}
