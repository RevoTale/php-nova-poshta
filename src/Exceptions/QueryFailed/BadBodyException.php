<?php

namespace BladL\NovaPoshta\Exceptions\QueryFailed;

final class BadBodyException extends QueryFailedException
{
    public function __construct(string $msg)
    {
        parent::__construct($msg);
    }
}
