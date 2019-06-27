<?php

declare(strict_types=1);

namespace WeDev\Identifier;

use Ramsey\Uuid\Uuid;

class RandomIdentificator extends Identificator
{
    private function __construct()
    {
        $this->id = Uuid::uuid5(Uuid::uuid5(Uuid::NAMESPACE_DNS, RandomToken::generate()), RandomToken::generate());
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

    public static function generate(): self
    {
        return new static();
    }
}
