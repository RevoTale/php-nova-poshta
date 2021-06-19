<?php
declare(strict_types=1);


namespace BladL\NovaPoshta\Results;


use BladL\NovaPoshta\DataContainers\SettlementStreet;

final class SearchSettlementResult extends Result
{
    /**
     * @return SettlementStreet[]
     */
    public function getStreets(): array
    {
        return array_map(static fn (array $data) => new SettlementStreet($data), $this->container->getData()[0]['Addresses']);
    }

    public function getTotalCount(): int
    {
        return $this->container->getData()[0]['TotalCount'];
    }
}
