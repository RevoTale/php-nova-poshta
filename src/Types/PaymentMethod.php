<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Types;

enum PaymentMethod: string
{
    case Cash = 'Cash';
    case NonCash = 'NonCash';
}
