<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\Exception\QueryFailed;

final class BadBodyException extends QueryFailedException
{
    public function __construct(string $msg)
    {
        parent::__construct($msg);
    }
}
