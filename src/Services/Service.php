<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\NovaPoshtaAPI;

abstract class Service
{
    public function __construct(protected NovaPoshtaAPI $api)
    {
    }
}
