<?php

namespace WeDev\Identifier\Test;

use PHPUnit\Framework\TestCase;

class RandomIdentificatorTest extends TestCase
{
    /**
     * @test
     */
    public function shoud_generate_random_id()
    {
        $id = new RandomIdentificator();
    }
}
