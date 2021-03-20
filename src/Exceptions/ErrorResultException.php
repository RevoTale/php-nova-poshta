<?php

declare(strict_types=1);

namespace Awanturist\NovaPoshtaAPI\Exceptions;

use JetBrains\PhpStorm\Pure;

final class ErrorResultException extends QueryFailedException
{
    /**
     * @param string[] $errors
     */
    #[Pure]
    public function __construct(protected array $errors)
    {
        parent::__construct('АПИ Новой Почты вернуло негативный результат: '.implode(', ', $errors));
    }

    /**
     * @return string[]
     */
    final public function getErrorMessages(): array
    {
        return $this->errors;
    }
}
