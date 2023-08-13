<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\Exceptions\BadFieldValueException;

/**
 * @internal
 */
trait Countable
{
    public function getTotalCount(): int
    {
        $info  =$this->getResultContainer()->getInfo();
        if (is_scalar($info['totalCount'])) {
            return (int)$info['totalCount'];
        }
       throw new BadFieldValueException('Total count is not scalar');
    }

    abstract protected function getResultContainer(): ResultContainer;
}
