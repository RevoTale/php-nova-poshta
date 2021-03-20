<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Results;

abstract class Result
{
    public function __construct(protected ResultContainer $container)
    {
    }
}
