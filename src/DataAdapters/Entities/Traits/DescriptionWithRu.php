<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects\Traits;

/**
 * @internal
 */
trait DescriptionWithRu
{
    use Description;

    final public function getDescriptionRu(): string
    {
        return $this->data->string('DescriptionRu');
    }
}
