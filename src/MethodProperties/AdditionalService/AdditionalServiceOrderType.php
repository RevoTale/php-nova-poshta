<?php
declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\AdditionalService;

enum AdditionalServiceOrderType:string
{
    case OrderCargoReturn = 'orderCargoReturn';
    case OrderChangeEW = 'orderChangeEW';
    case OrderRedirecting = 'orderRedirecting';
}
