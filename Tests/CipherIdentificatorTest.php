<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use WeDev\Identifier\CipherIdentificator;

class CipherIdentificatorTest extends TestCase
{
    private const A_INTEGER_ID = 1;
    private const A_FLOAT_ID = 1.3;
    private const A_STRING_ID = 'dsfsdfdsf';
    private const A_NULL = null;
    private $id;

    public function setUp()
    {
        parent::setUp();
        $this->id = CipherIdentificator::generate(self::A_STRING_ID);
    }

    /**
     * @test
     */
    public function xxx()
    {
        $this->expectException(\TypeError::class);
        CipherIdentificator::generate(self::A_NULL);
    }

    /**
     * @test
     */
    public function shouldGenerateValidId()
    {
        $this->assertTrue(Uuid::isValid($this->id));
    }

    /**
     * @test
     */
    public function shouldWorkWithFloats()
    {
        $id = CipherIdentificator::generate(self::A_FLOAT_ID);
        $this->assertTrue(Uuid::isValid($id));
    }

    /**
     * @test
     */
    public function shouldWorkWithIntegers()
    {
        $id = CipherIdentificator::generate(self::A_INTEGER_ID);
        $this->assertTrue(Uuid::isValid($id));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualWithThreeEquals()
    {
        $cloneId = clone $this->id;
        $this->assertFalse($this->id === $cloneId);
    }

    /**
     * @test
     */
    public function shouldBeEqualWithTwoEquals()
    {
        $cloneId = clone $this->id;
        $this->assertTrue($this->id == $cloneId);
    }
}
