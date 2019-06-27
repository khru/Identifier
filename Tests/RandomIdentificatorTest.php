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
        $id = RandomIdentificator::generate();
        $this->assertTrue(Uuid::isValid($id));
    }

    /**
     * @test
     */
    public function shouldNotBeEqualWithThreeEquals()
    {
        $id = RandomIdentificator::generate();
        $cloneId = clone $id;
        $this->assertFalse($id === $cloneId);
    }

    /**
     * @test
     */
    public function shouldBeEqualWithTwoEquals()
    {
        $id = RandomIdentificator::generate();
        $cloneId = clone $id;
        $this->assertTrue($id == $cloneId);
    }
}
