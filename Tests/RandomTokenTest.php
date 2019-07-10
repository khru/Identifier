<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Identifier\CipherToken;
use WeDev\Identifier\RandomToken;

class RandomTokenTest extends TestCase
{
    private const SIZE_OF_TOKEN = 128;

    /**
     * @test
     */
    public function shouldCreateATokenRandom()
    {
        $token = RandomToken::generate();
        $this->assertTrue(null !== $token);
        $this->assertTrue(self::SIZE_OF_TOKEN === $token->count());
    }

    /**
     * @test
     */
    public function shouldBeDifferent()
    {
        $a_token = RandomToken::generate();
        $an_other_token = RandomToken::generate();
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
