<?php

namespace Newride\Classnames;

class BEM
{
    public static function modifier(string $baseClass, string $modifier = null): string
    {
        if (is_null($modifier)) {
            return $baseClass;
        }

        return Classnames::make($baseClass, $baseClass.'--'.$modifier);
    }
}
