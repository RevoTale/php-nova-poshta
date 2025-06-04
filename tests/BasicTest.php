<?php

declare(strict_types=1);

namespace RevoTale\NovaPoshta\Tests;

use Grisaia\NovaPoshta\NovaPoshtaAPI;
use Grisaia\NovaPoshta\Services\SettlementService;
use PHPUnit\Framework\TestCase;

final  class BasicTest extends TestCase
{
    public function testRequest()
    {
        $api = new NovaPoshtaAPI('');
        $result = $api->getService(SettlementService::class)->getSettlementList(1, 10);
        self::assertCount(10, $result->toArray());
    }
}
