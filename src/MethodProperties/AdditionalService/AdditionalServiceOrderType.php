<?php
declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\AdditionalService;

enum AdditionalServiceOrderType:string
{
    case OrderCargoReturn = 'orderCargoReturn';
    case OrderChangeEW = 'orderChangeEW';
    case OrderRedirecting = 'orderRedirecting';
}
