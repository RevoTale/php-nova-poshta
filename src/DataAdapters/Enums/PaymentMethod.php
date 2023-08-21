<?php
declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Enums;

enum PaymentMethod: string
{
    case Cash = 'Cash';
    case NonCash = 'NonCash';
}
