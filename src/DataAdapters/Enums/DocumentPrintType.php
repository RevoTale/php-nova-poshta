<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Enums;

enum DocumentPrintType: string
{
    case PDF = 'pdf';
    case HTML = 'html';
}
