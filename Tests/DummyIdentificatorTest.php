<?php

namespace WeDev\Identifier\Tests;

use PHPUnit\Framework\TestCase;
use WeDev\Identifier\CipherIdentificator;
use WeDev\Identifier\DummyIdentificator;
use WeDev\Identifier\NumericIdentificator;
use WeDev\Identifier\RandomIdentificator;

class DummyIdentificatorTest extends TestCase
{
    private const A_RANDOM_ID = 'akjshdkasjhdakjshdkajshdaskjd';
    private const A_NUMERIC_ID = '5';

    /**
     * @test
     */
    public function shouldBeEmptyOnCall()
    {
        $id = DummyIdentificator::generate();
        $this->assertEmpty($id());
    }

    /**
     * @test
     */
    public function shouldBeEmptyString()
    {
        $id = DummyIdentificator::generate();
        $this->assertEmpty((string) $id);
    }

    /**
     * @test
     */
    public function shouldBeEqualNullIdentificator()
    {
        $id = DummyIdentificator::generate();
        $cloneId = clone $id;
        $this->assertTrue($id->equals($cloneId));
    }

    /**
     * @test
     */
    public function shouldBeEqualByRandomId()
    {
        $a_id = RandomIdentificator::generate();
        $id = DummyIdentificator::generate((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }

    /**
     * @test
     */
    public function shouldBeEqualByCipherId()
    {
        $a_id = CipherIdentificator::generate(self::A_RANDOM_ID);
        $id = DummyIdentificator::generate((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }

    /**
     * @test
     */
    public function shouldBeEqualByNumericId()
    {
        $a_id = NumericIdentificator::generate(self::A_NUMERIC_ID);
        $id = DummyIdentificator::generate((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }
}
