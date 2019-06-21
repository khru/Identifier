<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use WeDev\Identifier\CipherIdentificator;

class CipherIdentificatorTest extends TestCase
{

    private const A_ID = 1;
    private $id;

    public function setUp()
    {
        parent::setUp();
        $this->id = new CipherIdentificator(self::A_ID);
    }

    /**
     * @test
     */
    public function should_generate_valid_id()
    {
        $this->assertTrue(Uuid::isValid($this->id));
    }

    /**
     * @test
     */
    public function should_not_be_equal_with_three_equals()
    {
        $cloneId = clone $this->id;
        $this->assertFalse($this->id === $cloneId);
    }

    /**
     * @test
     */
    public function should_be_equal_with_two_equals()
    {
        $cloneId = clone $this->id;
        $this->assertTrue($this->id == $cloneId);
    }
}
