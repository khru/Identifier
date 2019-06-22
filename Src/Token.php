<?php

declare(strict_types=1);

namespace WeDev\Identifier;

abstract class Token
{
    private const DICTIONARY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890';
    private const RANDOM_BYTES = 2048;

    private function randomStringFromDictionary(): string
    {
        $str = self::DICTIONARY . microtime();
        $cad = '';
        for ($i = 0; $i < 15; ++$i) {
            $cad .= mb_substr($str, mt_rand(0, strlen($str)), 1) . microtime();
        }

        return base64_encode(str_replace(' ', '', $cad));
    }

    public function createRandomString($content = null): string
    {
        return  hash_hmac(
            'sha512',
            $this->randomStringFromDictionary() . $content,
            str_shuffle(bin2hex(random_bytes(self::RANDOM_BYTES)) . md5($this->randomStringFromDictionary() . $content))
        );
    }

    abstract public function __toString(): string;

    abstract public function __invoke();
}
