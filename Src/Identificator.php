<?php

declare(strict_types=1);

namespace WeDev\Identifier;

abstract class Identificator
{
    private $id;

    abstract public function __toString(): string;
}
