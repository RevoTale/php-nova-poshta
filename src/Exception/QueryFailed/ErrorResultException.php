<?php

declare(strict_types=1);

namespace Grisaia\NovaPoshta\Exception\QueryFailed;

use Grisaia\NovaPoshta\DataAdapters\Enums\ErrorCode;

final class ErrorResultException extends QueryFailedException
{
    /**
     * @param list<string> $errors
     * @param list<string> $errorCodes
     */
    public function __construct(
        private readonly array $errors,
        private readonly array $errorCodes
    ) {
        parent::__construct('АПИ Новой Почты вернуло негативный результат: ' . implode(', ', $errors));
    }

    /**
     * @return list<ErrorCode>
     */
    public function getErrorCodes(): array
    {
        return array_map(static fn (string $errorCode) =>ErrorCode::from($errorCode), $this->errorCodes);
    }

    /**
     * @return list<string>
     */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }
}
