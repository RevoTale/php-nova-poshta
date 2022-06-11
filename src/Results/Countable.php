<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

/**
 * @internal
 */
trait Countable
{
    public function getTotalCount(): int
    {
        return $this->getResultContainer()->getInfo()['totalCount'];
    }

    abstract protected function getResultContainer(): ResultContainer;
}
