<?php

namespace Newride\Classnames\tests;

use Newride\Classnames\Classnames;
use PHPUnit\Framework\TestCase;

class createTest extends TestCase
{
    public function classNamesProvider()
    {
        return [
            [ 'foo bar', [ 'foo', 'bar' ] ],
            [ 'foo bar', [ 'foo', [ 'bar' => true ] ] ],
            [ 'foo-bar', [ [ 'foo-bar' => true ] ] ],
            [ '', [ [ 'foo-bar' => false ] ] ],
            [ 'foo bar', [ [ 'foo' => true ], [ 'bar' => true ] ] ],
            [ 'foo bar', [ [ 'foo' => true, 'bar' => true ] ] ],
        ];
    }

    /**
     * @dataProvider classNamesProvider
     */
    public function testThatClassnamesAreGenerated(string $expected, array $classnames): void
    {
        $this->assertSame($expected, Classnames::make(...$classnames));
    }
}
