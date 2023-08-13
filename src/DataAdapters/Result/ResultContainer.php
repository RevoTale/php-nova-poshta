<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\DataAdapters\Result;

use BladL\NovaPoshta\Exception\BadFieldValueException;
use UnexpectedValueException;

use function assert;
use function is_array;

final readonly class ResultContainer
{
    /**
     * @param array<string,mixed> $response
     */
    public function __construct(private array $response)
    {
    }

    public function isSuccess(): bool
    {
        $value = $this->response['success'];
        if (is_scalar($value)) {
            return (bool)$value;
        }
        throw new BadFieldValueException('Bad "success" property');
    }

    /**
     * @return array<string,mixed>
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @return array<int|string,mixed>
     */
    public function getInfo(): array
    {
        $info = $this->response['info'];
        if (!is_array($info)) {
            throw new BadFieldValueException('Bad info property');
        }
        /**
         * @var array<int|string,mixed> $info
         */
        return $info;
    }

    /**
     * @return array<int|string,mixed>
     */
    public function getData(): array
    {
        $data = $this->response['data'];
        assert(is_array($data));
        /**
         * @var array<int|string,mixed> $data
         */
        return $data;
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
     * @return list<array<string,mixed>>
     */
    public function getObjectList(): array
    {
        $data = $this->getDataAsList();
        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new BadFieldValueException('List member is not object');
            }
        }
        /**
         * @var list<array<string,mixed>> $data
         */
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
        $list = $this->getObjectList();
        return array_map(
            static fn (array $data) => new $class($data),
            $list
        );
    }
}
