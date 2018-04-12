<?php

namespace Newride\Classnames;

class Classnames
{
    public static function make(...$classnames): string
    {
        return array_reduce($classnames, function (string $carry, $classname): string {
            return trim($carry.' '.static::makeFromAny($classname));
        }, '');
    }

    public static function makeFromAny($classname): string
    {
        if (is_string($classname)) {
            return static::makeFromString($classname);
        } elseif (is_array($classname)) {
            return static::makeFromArray($classname);
        }
    }

    public static function makeFromArray(array $classnames): string
    {
        $classnames = array_filter($classnames);

        return static::make(...array_keys($classnames));
    }

    public static function makeFromString(string $classname): string
    {
        return trim($classname);
    }
}
