<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\MethodProperties\Address;

use BladL\NovaPoshta\Normalizer\MethodProperties;

class SettlementSearchProperties extends MethodProperties
{
    public function __construct(string $string, int $limit)
    {
        $this->setStr('CityName', $string);
        $this->setInt('Limit', $limit);
        $this->setInt('Page', 1);
    }
}
