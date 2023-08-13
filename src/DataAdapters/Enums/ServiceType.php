<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Decorators\Enums;

enum ServiceType: string
{
    case WarehouseWarehouse = 'WarehouseWarehouse';
    case WarehouseDoors = 'WarehouseDoors';
    case DoorsDoors = 'DoorsDoors';
    case DoorsWarehouse = 'DoorsWarehouse';
}
