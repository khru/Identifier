<?php


namespace WeDev\Identifier;


use Ramsey\Uuid\Uuid;

class CipherIdentificator extends Identificator
{
    public function __construct($content)
    {
        $this->id = Uuid::uuid5(Uuid::NAMESPACE_DNS, new CipherToken($content));
    }

    public function __invoke(): string
    {
        $this->__toString();
    }

    public function equals(Identificator $id): bool
    {
        return $this->__toString() === $id->__toString();
    }

    public function __toString(): string
    {
        return $this->id->toString();
    }
}
