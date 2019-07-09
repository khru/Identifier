<?php

declare(strict_types=1);

namespace WeDev\Identifier;

abstract class Token
{
    private const DICTIONARY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890';
    private const RANDOM_BYTES = 2048;
    private const MAX_NUMBER_OF_CHARS = 15;
    private const FIRST_CHAR = 0;
    private const AMAUNT_OF_CHARS = 1;
    private const EMPTY_STRING = '';
    private const SINGEL_SPACE = ' ';
    private const CIPHER_ALGORITHM = 'sha512';

    private function randomStringFromDictionary(): string
    {
        $str = self::DICTIONARY . microtime();
        $cad = '';
        for ($i = 0; $i < self::MAX_NUMBER_OF_CHARS; ++$i) {
            $cad .= substr(
                $str,
                mt_rand(self::FIRST_CHAR, strlen($str)),
                self::AMAUNT_OF_CHARS
            ) . microtime();
        }

        return base64_encode(str_replace(self::SINGEL_SPACE, self::EMPTY_STRING, trim($cad)));
    }

    protected function createRandomString($content = null): string
    {
        return  hash_hmac(
            self::CIPHER_ALGORITHM,
            $this->randomStringFromDictionary() . $content,
            str_shuffle(bin2hex(random_bytes(self::RANDOM_BYTES)) . md5($this->randomStringFromDictionary() . $content))
        );
    }

    abstract public function __toString(): string;

    abstract public function __invoke();
}
