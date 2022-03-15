<?php

declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\Services\AddressService;
use BladL\NovaPoshta\Services\CounterpartyService;
use BladL\NovaPoshta\Services\DocumentService;
use BladL\NovaPoshta\Services\ScanSheetService;

class NovaPoshtaServices
{
    public function __construct(private NovaPoshtaAPI $api)
    {
    }

    public function getAddressService(): AddressService
    {
        return new AddressService($this->api);
    }

    public function getCounterpartyService(): CounterpartyService
    {
        return new CounterpartyService($this->api);
    }

    public function getDocumentService(): DocumentService
    {
        return new DocumentService($this->api);
    }

    public function getScanSheetService(): ScanSheetService
    {
        return new ScanSheetService($this->api);
    }
}
