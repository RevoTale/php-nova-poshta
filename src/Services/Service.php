<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\NovaPoshtaAPI;

/**
 * @internal
 */
abstract readonly class Service
{
    /**
     * @internal
     */
    final public function __construct(protected NovaPoshtaAPI $api)
    {
    }
}
