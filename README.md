# classnames

This package is a PHP port of https://github.com/JedWatson/classnames.

## generate CSS class names

```php
use Newride\Classnames\Classnames;

Classnames::make('foo', 'bar'); // => 'foo bar'
Classnames::make('foo', [ 'bar' => true ]); // => 'foo bar'
Classnames::make([ 'foo-bar' => true ]); // => 'foo-bar'
Classnames::make([ 'foo-bar' => false ]); // => ''
Classnames::make([ 'foo' => true ], [ 'bar' => true ]); // => 'foo bar'
Classnames::make([ 'foo' => true, 'bar' => true ]); // => 'foo bar'
```
