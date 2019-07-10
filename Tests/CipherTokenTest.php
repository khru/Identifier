<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Identifier\CipherToken;
use WeDev\Identifier\RandomToken;

class CipherTokenTest extends TestCase
{
    private const A_NULL = null;
    private const AN_INT = 5;
    private const A_FLOAT = 5.5;
    private const A_EMPTY_ARRAY = [];
    private const SIZE_OF_TOKEN = 128;
    private const A_STRING = 'asdasdasdasdasd';

    /**
     * @test
     */
    public function shouldNotCreateAnId()
    {
        $this->expectException(\TypeError::class);
        CipherToken::generate(self::A_NULL);
    }

    /**
     * @test
     */
    public function shouldCreateATokenWithInteger()
    {
        $token = CipherToken::generate(self::AN_INT);
        $this->assertTrue(null !== $token);
        $this->assertTrue(self::SIZE_OF_TOKEN === $token->count());
    }

    /**
     * @test
     */
    public function shouldCreateATokenWithString()
    {
        $token = CipherToken::generate(self::A_STRING);
        $this->assertTrue(null !== $token);
        $this->assertTrue(self::SIZE_OF_TOKEN === $token->count());
    }

    /**
     * @test
     */
    public function shouldCreateATokenWithFloat()
    {
        $token = CipherToken::generate(self::A_FLOAT);
        $this->assertTrue(null !== $token);
    }

    /**
     * @test
     */
    public function shouldCreateATokenWithArray()
    {
        $this->expectException(\TypeError::class);
        CipherToken::generate(self::A_EMPTY_ARRAY);
    }

    /**
     * @test
     */
    public function shouldBeDifferent()
    {
        $a_random_id = 'SECRET';
        $a_token = CipherToken::generate($a_random_id);
        $an_other_token = CipherToken::generate($a_random_id);
        $this->assertTrue(!$a_token->equals($an_other_token));
    }

    /**
     * @test
     */
    public function shouldBeAbleToCompareDifferentTypesOfToken()
    {
        $a_random_id = 'SECRET';
        $a_token = RandomToken::generate();
        $an_other_token = CipherToken::generate($a_random_id);
        $this->assertTrue(!$a_token->equals($an_other_token));
    }
}
