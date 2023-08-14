<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters;

use BladL\NovaPoshta\DataAdapters\Result\ResultContainer;
use BladL\NovaPoshta\Exception\BadFieldValueException;

/**
 * @internal
 */
abstract readonly class Result
{
    /**
     * @param ResultContainer $container
     */
    public function __construct(protected ResultContainer $container)
    {
    }
}
