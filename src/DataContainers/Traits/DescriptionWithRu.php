<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataContainers\Traits;

/**
 * @internal
 */
trait DescriptionWithRu
{
    use Description;

    public function getDescriptionRu(): string
    {
        return $this->data->string('DescriptionRu');
    }
}
