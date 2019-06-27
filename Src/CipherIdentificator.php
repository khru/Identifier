<?php

declare(strict_types=1);

namespace WeDev\Identifier;

use Ramsey\Uuid\Uuid;

class CipherIdentificator extends Identificator
{
    private function __construct(string $content)
    {
        $this->id = Uuid::uuid5(Uuid::NAMESPACE_DNS, CipherToken::generate($content))->toString();
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
        return $this->id;
    }

    public static function generate(string $content): self
    {
        return new static($content);
    }
}
