<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\MethodProperties\AdditionalService\Save;

use Grisaia\NovaPoshta\DataAdapters\Enums\CounterpartyPersonType;
use Grisaia\NovaPoshta\DataAdapters\Enums\PaymentMethod;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceOrderType;
use Grisaia\NovaPoshta\MethodProperties\AdditionalService\AdditionalServiceSaveProperties;

class ChangeEWProperties extends AdditionalServiceSaveProperties
{
    public function __construct()
    {
        parent::__construct(orderType: AdditionalServiceOrderType::OrderChangeEW);
    }

    public function setSenderPhone(string $phone): void
    {
        $this->setStr(
            'SenderPhone',
            $phone
        );
    }

    public function setSenderContactName(string $name): void
    {
        $this->setStr('SenderContactName', $name);
    }

    public function setRecipientRef(string $ref): void
    {
        $this->setStr('Recipient', $ref);
    }

    public function setPayerType(CounterpartyPersonType $type): void
    {
        $this->setStr('PayerType', $type->value);
    }

    public function setRecipientContactName(string $name): void
    {
        $this->setStr('RecipientContactName', $name);
    }

    public function setRecipientPhone(string $phone): void
    {
        $this->setStr('RecipientPhone', $phone);
    }

    public function setPaymentMethod(PaymentMethod $method): void
    {
        $this->setStr('PaymentMethod', $method->value);
    }

}
