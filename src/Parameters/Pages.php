<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Parameters;

/**
 * @internal
 */
trait Pages
{
    abstract protected function setInt(string $key, int $value): void;

    final public function setPagination(int $page, int $recordsPerPage): void
    {
        $this->setInt('Page', $page);
        $this->setInt('Limit', $recordsPerPage);
    }
}
