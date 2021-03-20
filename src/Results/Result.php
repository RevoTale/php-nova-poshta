<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

abstract class Result
{
    protected ResultContainer $container;

    public function __construct(ResultContainer $container)
    {
        $this->container = $container;
    }
}
