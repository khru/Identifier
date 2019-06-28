<?php

declare(strict_types=1);

namespace WeDev\Identifier;

abstract class Identificator
{
    protected $id;

    abstract public function __toString(): string;

    abstract public function __invoke();

    abstract public function equals(Identificator $id): bool;

    abstract public function getId();
}
