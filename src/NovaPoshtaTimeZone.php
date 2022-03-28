<?php
declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\Time\TimeZone;

/**
 * @psalm-immutable
 */
final class NovaPoshtaTimeZone extends TimeZone
{
    public function __construct()
    {
        parent::__construct('Europe/Kiev');
    }
}
