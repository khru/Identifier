<?php


namespace WeDev\Identifier\Tests;


use PHPUnit\Framework\TestCase;
use WeDev\Identifier\TextIdentificator;

class TextIdentificatorTest extends TestCase
{

    private const A_ID = "perro";

    /**
     * @test
     */
    public function shouldGenerateValidId()
    {
        $id = TextIdentificator::generate(self::A_ID);
        $this->assertTrue($id() === self::A_ID);
    }

    /**
     * @test
     */
    public function shouldNotBeEqualWithThreeEquals()
    {
        $id = TextIdentificator::generate(self::A_ID);
        $cloneId = clone $id;
        $this->assertFalse($id === $cloneId);
    }

    /**
     * @test
     */
    public function shouldBeEqualWithTwoEquals()
    {
        $id = TextIdentificator::generate(self::A_ID);
        $cloneId = clone $id;
        $this->assertTrue($id == $cloneId);
    }
}
