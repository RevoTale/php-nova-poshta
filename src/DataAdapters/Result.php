<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\DataAdapters\Result\ResultContainer;

/**
 * @internal
 */
abstract readonly class Result
{
    protected ResultContainer $container;

    public function __construct(ResultContainer $container)
    {
        $this->container = $container;
    }
}
