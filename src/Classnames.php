<?php

namespace Newride\Classnames;

class Classnames
{
    public static function any($classname): string
    {
        if (is_string($classname) || is_numeric($classname)) {
            return static::string($classname);
        } elseif (is_array($classname)) {
            return static::array($classname);
        }

        return static::object($classname);
    }

    public static function array(array $classnames): string
    {
        $classnames = array_filter($classnames);

        return static::flatten(...array_keys($classnames));
    }

    public static function flatten(...$classnames): string
    {
        $ret = array_reduce($classnames, function (string $carry, $classname): string {
            return $carry.' '.trim(static::any($classname));
        }, '');

        return trim($ret);
    }

    public static function make(...$classnames): string
    {
        $flattened = static::flatten(...$classnames);
        $flattened = explode(' ', $flattened);

        return implode(' ', array_unique($flattened));
    }

    public static function object(object $classname): string
    {
        if (!method_exists($classname, '__toString')) {
            throw new NotConvertibleTypeException(sprintf(
                '%s cannot be converted to string', print_r($classname, true)
            ));
        }

        $string = strval($classname);

        return static::string($string);
    }

    public static function string(string $classname): string
    {
        return trim($classname);
    }
}
