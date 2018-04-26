# classnames

This package is a PHP port of https://github.com/JedWatson/classnames.

The only difference is that `Classnames` deduplicate classes by default.
It means that `Classnames::make('foo', 'foo', 'bar)` returns `'foo bar'`
instead of `foo foo bar` by default. It's because redraws in PHP do not
happen that often as they do in JavaScript (original implementation) so 
it's not an issue and the output code is cleaner.

If you want to use `Classnames` without deduplication you can call
`Classnames::flatten`.

## Generate CSS class names

```php
use Newride\Classnames\Classnames;

Classnames::make('foo', 'bar'); // => 'foo bar'
Classnames::make('foo', [ 'bar' => true ]); // => 'foo bar'
Classnames::make([ 'foo-bar' => true ]); // => 'foo-bar'
Classnames::make([ 'foo-bar' => false ]); // => ''
Classnames::make([ 'foo' => true ], [ 'bar' => true ]); // => 'foo bar'
Classnames::make([ 'foo' => true, 'bar' => true ]); // => 'foo bar'
Classnames::make(1, 2, 3); // => '1 2 3'

Classnames::make('foo', 'foo', 'bar'); // => 'foo bar'
Classnames::flatten('foo', 'foo', 'bar'); // => 'foo foo bar'
```

## Invalid class names

When type non convertible to string is used as an argument then exception is
thrown.

```php
Classnames::flatten(new stdClass()); // => throws \Newride\Classnames\NotConvertibleTypeException
```
