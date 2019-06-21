<?php

namespace WeDev\Identifier;

class Token
{
    private const DICTIONARY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890';
    private const RANDOM_BYTES = 2048;
    private const MAX_RANDOM = 512;

    private $token;

    public function __construct()
    {
        $this->token = $this->createRandomString();
    }

    private function randomStringFromDictionary(): string
    {
        $str = self::DICTIONARY . microtime();
        $cad = '';
        for ($i = 0; $i < 15; ++$i) {
            $cad .= mb_substr($str, mt_rand(0, 73), 1) . microtime();
        }

        return $cad;
    }

    public function createRandomString(): string
    {
        return  hash_hmac('sha512',
            $this->randomStringFromDictionary(),
            str_shuffle(bin2hex(random_bytes(self::RANDOM_BYTES)) . sha1(mt_rand(0, self::MAX_RANDOM))));
    }

    public function __toString()
    {
        return $this->token;
    }
}
