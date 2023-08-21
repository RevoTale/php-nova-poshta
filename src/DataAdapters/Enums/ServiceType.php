<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\DataAdapters\Enums;

enum ServiceType: string
{
    case WarehouseWarehouse = 'WarehouseWarehouse';
    case WarehouseDoors = 'WarehouseDoors';
    case DoorsDoors = 'DoorsDoors';
    case DoorsWarehouse = 'DoorsWarehouse';
}
