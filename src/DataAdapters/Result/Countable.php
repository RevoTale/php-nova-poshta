<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Result;

use Grisaia\NovaPoshta\DataAdapters\ResponseContainer;

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

    abstract protected function getResultContainer(): ResponseContainer;
}
