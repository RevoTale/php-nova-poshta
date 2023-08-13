<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Enums;

enum PaymentMethod: string
{
    case Cash = 'Cash';
    case NonCash = 'NonCash';
}
