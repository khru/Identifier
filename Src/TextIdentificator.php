<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class TextIdentificator extends Identificator
{
    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function __invoke(): string
    {
        return $this->id;
    }

    public function equals(Identificator $id): bool
    {
        return $this->__toString() === $id->__toString();
    }

    public static function generate(string $content): self
    {
        return new static($content);
    }

    public function getId(): string
    {
        return $this->id;
    }
}
