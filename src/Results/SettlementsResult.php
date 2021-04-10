<?php
declare(strict_types=1);


namespace BladL\NovaPoshta\Results;


use BladL\NovaPoshta\DataContainers\Settlement;

final class SettlementsResult extends Result
{
    /**
     * @return Settlement[]
     */
    public function toArray(): array
    {
        return array_map(static fn (array $data) => new Settlement($data), $this->container->getData());
    }
}
