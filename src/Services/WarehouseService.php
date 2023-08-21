<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Services;

use Grisaia\NovaPoshta\DataAdapters\Entities\Location\WarehouseType;
use Grisaia\NovaPoshta\DataAdapters\Result\WarehousesResult;
use Grisaia\NovaPoshta\DataAdapters\Result\WarehouseTypesResult;
use Grisaia\NovaPoshta\Exception\QueryFailed\QueryFailedException;
use Grisaia\NovaPoshta\MethodProperties\Address\WarehouseListProperties;

final readonly class WarehouseService extends Service
{
    /**
     * @throws QueryFailedException
     */
    public function getWarehouseList(WarehouseListProperties $parameters): WarehousesResult
    {
        return new WarehousesResult($this->api->fetch('Address', 'getWarehouses', $parameters->getProperties()));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypeList(): WarehouseTypesResult
    {
        return new WarehouseTypesResult($this->api->fetch('Address', 'getWarehouseTypes', []));
    }

    /**
     * @throws QueryFailedException
     */
    public function getWarehouseTypeByRef(string $ref): WarehouseType
    {
        return new WarehouseType(
            $this->api->fetch(
                'Address',
                'getWarehouseTypes',
                ['Ref' => $ref]
            )->getDataAsObjectList()[0]
        );
    }

    /**
     * @throws QueryFailedException
     */
    public function getSettlementWarehouses(string $settlementRef): WarehousesResult
    {
        return new WarehousesResult($this->api->fetch('Address', 'getWarehouses', [
            'SettlementRef' => $settlementRef,
        ]));
    }
}
