<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use WeDev\Identifier\RandomIdentificator;

class RandomIdentificatorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGenerateValidId()
    {
        $id = new RandomIdentificator();
        $this->assertTrue(Uuid::isValid($id));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualWithThreeEquals()
    {
        $id = new RandomIdentificator();
        $cloneId = clone $id;
        $this->assertFalse($id === $cloneId);
    }

    /**
     * @test
     */
    public function shouldBeEqualWithTwoEquals()
    {
        $id = new RandomIdentificator();
        $cloneId = clone $id;
        $this->assertTrue($id == $cloneId);
    }
}
