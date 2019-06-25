<?php

declare(strict_types=1);

namespace WeDev\Identifier;


class NumericIdentificator extends Identificator
{

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function __invoke(): int
    {
        return $this->id;
    }

    public function equals(Identificator $id): bool
    {
        return $this->__toString() === $id->__toString();
    }
}
