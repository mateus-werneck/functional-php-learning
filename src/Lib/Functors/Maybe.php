<?php

namespace Lib\Functors;

abstract class Maybe
{

    public static function fromValue(mixed $value, mixed $nullValue = null): Maybe
    {
        if (is_null($nullValue)) self::nothing();

        return self::just($value);
    }
    /**
     * @param mixed $value
     */
    public static function just($value): Just 
    {
        return new Just($value);
    }
    /**
     * @param mixed $value
     */
    public static function nothing(): Nothing 
    {
        return Nothing::get();
    }

    abstract public function isJust(): bool;

    abstract public function isNothing(): bool;

    abstract public function getOrElse(mixed $default): mixed;
    /**
     * @param callable(): mixed $f
     */
    abstract public function map(callable $f): Maybe;

    abstract public function orElse(Maybe $m): Maybe;
    /**
     * @param callable(): mixed $f
     */
    abstract public function flatMap(callable $f): Maybe;
    /**
     * @param callable(): mixed $f
     */
    abstract public function filter(callable $f): Maybe;
}
