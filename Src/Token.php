<?php

declare(strict_types=1);

namespace WeDev\Identifier;

abstract class Token implements \Countable
{
    private const DICTIONARY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890';
    private const RANDOM_BYTES = 2048;
    private const MAX_NUMBER_OF_CHARS = 15;
    private const FIRST_CHAR = 0;
    private const AMAUNT_OF_CHARS = 1;
    private const EMPTY_STRING = '';
    private const SINGEL_SPACE = ' ';
    private const CIPHER_ALGORITHM = 'sha512';
    private const DATA_SEPARATOR = '-';
    private const INITIAL_COUNTER = 0;

    private function randomStringFromDictionary(): string
    {
        $str = self::DICTIONARY . microtime();
        $cad = self::EMPTY_STRING;
        for ($i = self::INITIAL_COUNTER; $i < self::MAX_NUMBER_OF_CHARS; ++$i) {
            $cad .= substr(
                $str,
                mt_rand(self::FIRST_CHAR, strlen($str)),
                self::AMAUNT_OF_CHARS
            ) . microtime() . mt_rand();
        }

        return base64_encode(str_replace(self::SINGEL_SPACE, self::EMPTY_STRING, $cad));
    }

    protected function createRandomString($content = ''): string
    {
        return  hash_hmac(
            self::CIPHER_ALGORITHM,
            $this->randomStringFromDictionary() . self::DATA_SEPARATOR
            . $content . self::DATA_SEPARATOR . microtime(),
            bin2hex(random_bytes(self::RANDOM_BYTES)) .
            md5(str_shuffle($this->randomStringFromDictionary() . $content . mt_rand()))
        );
    }

    abstract public function __toString(): string;

    abstract public function __invoke();

    abstract public function equals(Token $token): bool;
}
