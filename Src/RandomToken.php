<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class RandomToken extends Token
{
    private $token;

    private function __construct()
    {
        $this->token = $this->createRandomString();
    }

    public function __toString(): string
    {
        return $this->token;
    }

    public function __invoke(): string
    {
        return $this->token;
    }

    public static function generate(): self
    {
        return new static();
    }

    public function count()
    {
        return strlen($this->token);
    }

    public function equals(Token $token): bool
    {
        return $this->__toString() === $token->__toString();
    }
}
