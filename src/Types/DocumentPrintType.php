<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

enum DocumentPrintType: string
{
    case PDF = 'pdf';
    case HTML = 'html';
}
