<?php

declare(strict_types=1);

namespace WeDev\Identifier;

class RandomToken extends Token
{
    private $token;

    public function __construct()
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
}
