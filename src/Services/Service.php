<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Services;

use BladL\NovaPoshta\NovaPoshtaAPI;

/**
 * @internal
 */
abstract class Service
{
    /**
     * @internal
     */
    final public function __construct(protected readonly NovaPoshtaAPI $api)
    {
    }
}
