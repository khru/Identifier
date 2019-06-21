<?php


namespace WeDev\Identifier;


class CipherToken extends Token
{
    private $token;

    public function __construct($content)
    {
        $this->token = $this->createRandomString($content);
    }

    public function __toString(): string
    {
        return $this->token;
    }

    public function __invoke()
    {
        return $this->token;
    }
}
