<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects\Traits;

/**
 * @internal
 */
trait Description
{
    final public function getDescription(): string
    {
        return $this->data->string('Description');
    }
}
