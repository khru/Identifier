<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class DummyIdentificator extends Identificator
{
    private const EMPTY_STRING = '';

    private function __construct(string $content = '')
    {
        $this->id = $content;
    }

    public function __toString(): string
    {
        return null !== $this->id ? $this->id : self::EMPTY_STRING;
    }

    /**
     * This method could return anything
     * because it may take anything as an argument.
     */
    public function __invoke()
    {
        return $this->id;
    }

    public function equals(Identificator $id): bool
    {
        return $this->__toString() === $id->__toString();
    }

    public static function generate(string $content = ''): self
    {
        return new static($content);
    }

    public function getId()
    {
        return $this->id;
    }
}
