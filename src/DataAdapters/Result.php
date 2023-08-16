<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters;

/**
 * @internal
 */
abstract readonly class Result
{
    /**
     * @param ResponseContainer $container
     */
    public function __construct(protected ResponseContainer $container)
    {
    }
}
