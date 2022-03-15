<?php

declare(strict_types=1);

namespace BladL\NovaPoshta;

use BladL\NovaPoshta\Services\AddressService;
use BladL\NovaPoshta\Services\CounterpartyService;
use BladL\NovaPoshta\Services\DocumentService;
use BladL\NovaPoshta\Services\ScanSheetService;

/**
 * @deprecated use NovaPoshtaAPI->getService()
 */
class NovaPoshtaServices
{
    public function __construct(private NovaPoshtaAPI $api)
    {
    }

    public function getAddressService(): AddressService
    {
        return $this->api->getService(AddressService::class);
    }

    public function getCounterpartyService(): CounterpartyService
    {
        return $this->api->getService(CounterpartyService::class);
    }

    public function getDocumentService(): DocumentService
    {
        return $this->api->getService(DocumentService::class);
    }

    public function getScanSheetService(): ScanSheetService
    {
        return $this->api->getService(ScanSheetService::class);
    }
}
