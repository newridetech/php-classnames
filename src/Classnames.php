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
        } elseif (!is_object($classname)) {
            // null, bool, etc
            return '';
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
        $ret = static::reduce($classnames);

        return implode(' ', $ret);
    }

    public static function make(...$classnames): string
    {
        $reduced = static::reduce($classnames);

        return implode(' ', array_unique($reduced));
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

    public static function reduce(array $classnames): array
    {
        return array_reduce($classnames, function (array $carry, $classname): array {
            $parsed = trim(static::any($classname));

            if (!empty($parsed)) {
                $carry[] = $parsed;
            }

            return $carry;
        }, []);
    }

    public static function string(string $classname): string
    {
        return trim($classname);
    }
}
