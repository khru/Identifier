<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Identifier\CipherToken;

class CipherTokenTest extends TestCase
{
    private const A_NULL = null;
    private const AN_INT = 5;
    private const A_FLOAT = 5.5;

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
    }

    /**
     * @test
     */
    public function shouldCreateATokenWithFloat()
    {
        $this->markTestSkipped();
        CipherToken::generate(self::A_FLOAT);
    }
}
