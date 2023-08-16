<?php
declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception\QueryFailed;

final class BadBodyException extends QueryFailedException
{
    public function __construct(string $msg)
    {
        parent::__construct($msg);
    }
}
