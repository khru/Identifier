<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class CipherToken extends Token
{
    private $token;

    private function __construct(string $content)
    {
        $this->token = $this->createRandomString($content);
    }

    public function __toString(): string
    {
        return $this->token;
    }

    public function __invoke(): string
    {
        return $this->token;
    }

    public static function generate(string $content): self
    {
        return new static($content);
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
