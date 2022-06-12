<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions\QueryFailed;

use function count;

final class ErrorResultException extends QueryFailedException
{
    protected array $errors;
    protected array $errorCodes;

    /**
     * @param string[] $errors
     * @param string[] $errorCodes
     */
    public function __construct(array $errors, array $errorCodes)
    {
        $this->errors = $errors;
        $this->errorCodes = $errorCodes;
        parent::__construct('АПИ Новой Почты вернуло негативный результат: ' . implode(', ', $errors));
    }

    /**
     * @return string[]
     */
    public function getErrorCodes(): array
    {
        return $this->errorCodes;
    }

    public function hasErrorCode(string ...$errorCodes): bool
    {
        return count(array_intersect($errorCodes, $this->errorCodes)) > 0;
    }

    /**
     * @return string[]
     */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }
}
