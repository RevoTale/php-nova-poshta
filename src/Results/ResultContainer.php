<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Results;

use BladL\NovaPoshta\DataContainers\SettlementAreaItem;
use UnexpectedValueException;

final class ResultContainer
{
    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function isSuccess(): bool
    {
        return $this->response['success'];
    }

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getInfo(): array
    {
        return $this->response['info'];
    }

    public function getData(): array
    {
        return $this->response['data'];
    }

    /**
     * @return list<mixed>
     */
    public function getDataAsList(): array
    {
        $data = $this->getData();
        if (!array_is_list($data)) {
            throw new UnexpectedValueException();
        }
        return $data;
    }

    /**
     * @template T extends \BladL\NovaPoshta\DataContainers\DataContainer
     * @param class-string<T> $class
     * @return list<T>
     * @internal
     */
    public function getListOfItems(string $class): array
    {
        $list = $this->getDataAsList();
        return array_map(
            static fn(array $data) => new $class($data),
            $list
        );
    }
}
