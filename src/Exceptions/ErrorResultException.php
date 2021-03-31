<?php

declare(strict_types=1);

namespace BladL\NovaPoshta\Exceptions;

final class ErrorResultException extends QueryFailedException
{
    protected array $errors;

    /**
     * @param string[] $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct('АПИ Новой Почты вернуло негативный результат: '.implode(', ', $errors));
    }

    /**
     * @return string[]
     */
    public function getErrorMessages(): array
    {
        return $this->errors;
    }
}
