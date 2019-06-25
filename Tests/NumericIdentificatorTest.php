<?php


namespace WeDev\Identifier\Tests;


use PHPUnit\Framework\TestCase;
use WeDev\Identifier\NumericIdentificator;

class NumericIdentificatorTest extends TestCase
{

    private const A_ID = 5;
    /**
     * @test
     */
    public function shouldGenerateValidId()
    {
        $id = new NumericIdentificator(self::A_ID);
        $this->assertTrue($id() === 5);
    }

    /**
     * @test
     */
    public function shouldNotBeEqualWithThreeEquals()
    {
        $id = new NumericIdentificator(self::A_ID);
        $cloneId = clone $id;
        $this->assertFalse($id === $cloneId);
    }

    /**
     * @test
     */
    public function shouldBeEqualWithTwoEquals()
    {
        $id = new NumericIdentificator(self::A_ID);
        $cloneId = clone $id;
        $this->assertTrue($id == $cloneId);
    }
}
