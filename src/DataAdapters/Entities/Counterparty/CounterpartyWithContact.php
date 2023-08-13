<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Objects\Counterparty;

use BladL\NovaPoshta\DataAdapters\Result\Counterparty\ContactPersonResult;
use BladL\NovaPoshta\DataAdapters\Result\ResultContainer;

final readonly class CounterpartyWithContact extends Counterparty
{
    public function getContactPersonResult(): ContactPersonResult
    {
        return new ContactPersonResult(new ResultContainer($this->data->arrayObject('ContactPerson')));
    }
}
