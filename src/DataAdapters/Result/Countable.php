<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

/**
 * @internal
 */
trait Countable
{
    public function getTotalCount(): int
    {
        $info = $this->getResultContainer()->getInfo();
        return $info->object()->field('totalCount')->integer();
    }

    abstract protected function getResultContainer(): ResultContainer;
}
