<?php

declare(strict_types=1);

namespace RevoTale\NovaPoshta\Tests;

use Grisaia\NovaPoshta\Exception\QueryFailed\JsonParseException;
use Grisaia\NovaPoshta\NovaPoshtaAPI;
use Grisaia\NovaPoshta\ResponseParser;
use Grisaia\NovaPoshta\Services\SettlementService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Json;

final  class BasicTest extends TestCase
{
    public function testRequest(): void
    {
        $api = new NovaPoshtaAPI('');
        $result = $api->getService(SettlementService::class)->getSettlementList(1, 10);
        self::assertCount(10, $result->toArray());
    }

    public function testReponseParser(): void
    {
        $response = new ResponseParser();
        $this->expectException(JsonParseException::class);
        $response->parse('');
       $resp =  $response->parse('{
            "success": true,
            "info": {
                "code": 200,
                "message": "OK"
            },
            "data": [
                {
                    "Ref": "ref1",
                    "Description": "Settlement 1"
                },
                {
                    "Ref": "ref2",
                    "Description": "Settlement 2"
                }
            ]
        }');
        self::assertTrue($resp->isSuccess());
                self::assertEquals($resp->getData()[0]->getField('Ref'),'ref1');
                   self::assertEquals($resp->getData()[1]->getField('Description'),'Settlement 2');

    }
}
