<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Enums;

enum DocumentPrintType: string
{
    case PDF = 'pdf';
    case HTML = 'html';
}
