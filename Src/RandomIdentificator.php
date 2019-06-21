<?php

namespace WeDev\Identifier;

use Ramsey\Uuid\Uuid;

class RandomIdentificator extends Identificator
{
    public function __construct()
    {
        Uuid::uuid5();
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return '';
    }
}
