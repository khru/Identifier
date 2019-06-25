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
    public function shouldBeNullOnCall()
    {
        $id = new DummyIdentificator();
        $this->assertNull($id());
    }

    /**
     * @test
     */
    public function shouldBeEmptyString()
    {
        $id = new DummyIdentificator();
        $this->assertEmpty((string) $id);
    }

    /**
     * @test
     */
    public function shouldBeEqualNullIdentificator()
    {
        $id = new DummyIdentificator();
        $cloneId = clone $id;
        $this->assertTrue($id->equals($cloneId));
    }

    /**
     * @test
     */
    public function shouldBeEqualByRandomId()
    {
        $a_id = new RandomIdentificator();
        $id = new DummyIdentificator((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }

    /**
     * @test
     */
    public function shouldBeEqualByCipherId()
    {
        $a_id = new CipherIdentificator(self::A_RANDOM_ID);
        $id = new DummyIdentificator((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }

    /**
     * @test
     */
    public function shouldBeEqualByNumericId()
    {
        $a_id = new NumericIdentificator(self::A_NUMERIC_ID);
        $id = new DummyIdentificator((string) $a_id);
        $this->assertTrue($id->equals($a_id));
    }

}
