<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorator;

/**
 * @template T
 */
interface ListItemWrapperInterface
{
    /**
     * @return T
     */
    public function wrapItem(ValueDecorator $decorator): mixed;
}
