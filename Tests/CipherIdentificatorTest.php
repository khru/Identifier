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
    public function shouldGenerateValidId()
    {
        $this->assertTrue(Uuid::isValid($this->id));
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
