<?php

namespace Newride\Classnames;

class BEM
{
    public static function modifier(string $baseClass, ...$modifiers): string
    {
        if (empty($modifiers)) {
            return $baseClass;
        }

        $flattened = Classnames::flatten(...$modifiers);
        $flattened = explode(' ', $flattened);
        $flattened = array_filter($flattened);
        $flattened = array_map(function (string $modifier) use ($baseClass): string {
            return $baseClass.'--'.$modifier;
        }, $flattened);

        return Classnames::make($baseClass, ...$flattened);
    }
}
