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
    public function should_generate_valid_id()
    {
        $id = new RandomIdentificator();
        $this->assertTrue(Uuid::isValid($id));
    }

    /**
     * @test
     */
    public function should_not_be_equal_with_three_equals()
    {
        $id = new RandomIdentificator();
        $cloneId = clone $id;
        $this->assertFalse($id === $cloneId);
    }

    /**
     * @test
     */
    public function should_be_equal_with_two_equals()
    {
        $id = new RandomIdentificator();
        $cloneId = clone $id;
        $this->assertTrue($id == $cloneId);
    }
}
