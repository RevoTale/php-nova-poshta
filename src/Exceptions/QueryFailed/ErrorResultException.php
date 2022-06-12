<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions\QueryFailed;

use BladL\NovaPoshta\Types\ErrorCode;

final class ErrorResultException extends QueryFailedException
{
    /**
     * @param string[] $errors
     * @param string[] $errorCodes
     */
    public function __construct(
        private readonly array $errors,
        private readonly array $errorCodes
    ) {
        parent::__construct('АПИ Новой Почты вернуло негативный результат: ' . implode(', ', $errors));
    }

    /**
     * @return ErrorCode[]
     */
    public function getErrorCodes(): array
    {
        return array_map(static fn (string $errorCode) =>ErrorCode::from($errorCode), $this->errorCodes);
    }

    /**
     * @return string[]
     */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }
}
