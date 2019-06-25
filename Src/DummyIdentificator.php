<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class DummyIdentificator extends Identificator
{
    public function __construct($content = null)
    {
        $this->id = $content;
    }

    public function __toString(): string
    {
        return $this->id ? (string) $this->id : '';
    }

    /**
     * This method could return anything
     * because it may take anything as an argument
     */
    public function __invoke()
    {
        return $this->id;
    }

    public function equals(Identificator $id): bool
    {
        return $this->__toString() === $id->__toString();
    }
}
