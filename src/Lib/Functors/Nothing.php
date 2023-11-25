<?php

namespace Lib\Functors;

final class Nothing extends Maybe
{
    private static ?Nothing $instance = null;

    public static function get(): Nothing
    {
        self::$instance = self::$instance ?? new static();
        return self::$instance;
    }

    public function isJust(): bool
    {
        return false;
    }

    public function isNothing(): bool
    {
        return true;
    }

    public function getOrElse(mixed $default): mixed
    {
        return $default;
    }

    public function map(callable $f): Maybe
    {
        return $this;
    }

    public function orElse(Maybe $m): Maybe
    {
        return $m;
    }

    public function flatMap(callable $f): Maybe
    {
        return $this;
    }

    public function filter(callable $f): Maybe
    {
        return $this;
    }
}
