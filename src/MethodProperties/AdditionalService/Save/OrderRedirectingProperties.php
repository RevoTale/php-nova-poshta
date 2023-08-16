<?php

namespace Grisaia\NovaPoshta\MethodProperties\AdditionalService\Save;

use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceOrderType;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;

class OrderRedirectingProperties extends AdditionalServiceSaveProperties
{
    public function __construct()
    {
        parent::__construct(orderType: AdditionalServiceOrderType::OrderRedirecting);
    }

    public function setRecipientPhone(string $recipientPhone): void
    {
        $this->setStr('RecipientPhone', $recipientPhone);
    }

    public function setRecipientContactName(string $recipientContactName): void
    {
        $this->setStr('RecipientContactName', $recipientContactName);
    }

    public function setNoteAddressRecipient(string $noteAddressRecipient): void
    {
        $this->setStr('NoteAddressRecipient', $noteAddressRecipient);
    }

    public function setBuildingNumber(string $buildingNumber): void
    {
        $this->setStr('BuildingNumber', $buildingNumber);
    }
}
