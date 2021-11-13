<?php

declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\Services\AddressService;
use BladL\NovaPoshta\Services\CounterpartyService;
use BladL\NovaPoshta\Services\DocumentService;
use BladL\NovaPoshta\Services\ScanSheetService;
use JetBrains\PhpStorm\Pure;

class NovaPoshtaServices
{
    public function __construct(private NovaPoshtaAPI $api)
    {
    }

    #[Pure]
    public function getAddressService(): AddressService
    {
        return new AddressService($this->api);
    }

    #[Pure]
    public function getCounterpartyService(): CounterpartyService
    {
        return new CounterpartyService($this->api);
    }

    #[Pure]
    public function getDocumentService(): DocumentService
    {
        return new DocumentService($this->api);
    }

    #[Pure]
    public function getScanSheetService(): ScanSheetService
    {
        return new ScanSheetService($this->api);
    }
}
