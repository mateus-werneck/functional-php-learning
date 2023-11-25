<?php

namespace Lib\Functors;

final class Just extends Maybe
{
    private $value;

    public function __construct(mixed $value) 
    {
        $this->value = $value;
    }

    public function isJust(): bool
    {
        return true;
    }

    public function isNothing(): bool
    {
        return false;
    }

    public function getOrElse(mixed $default): mixed
    {
        return $this->value;
    }

    public function map(callable $f): Maybe
    {
        return new self($f($this->value));
    }

    public function orElse(Maybe $m): Maybe
    {
        return $this;
    }

    public function flatMap(callable $f): Maybe
    {
        return $f($this->value);
    }

    public function filter(callable $f): Maybe
    {
        return $f($this->value) ? $this : Maybe::nothing();
    }
    
    

}
