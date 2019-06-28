<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class NumericIdentificator extends Identificator
{
    private function __construct(int $id)
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

    public static function generate(int $id): self
    {
        return new static($id);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
