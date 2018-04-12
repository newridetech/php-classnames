<?php

namespace Newride\Classnames\tests;

use Newride\Classnames\Classnames;
use Newride\Classnames\tests\fixtures\Stringable;
use PHPUnit\Framework\TestCase;
use stdClass;

class createTest extends TestCase
{
    public function validClassNamesProvider()
    {
        return [
            [ 'foo bar', [ 'foo', 'bar' ] ],
            [ 'foo bar', [ 'foo', [ 'bar' => true ] ] ],
            [ 'foo-bar', [ [ 'foo-bar' => true ] ] ],
            [ '', [ [ 'foo-bar' => false ] ] ],
            [ 'foo bar', [ [ 'foo' => true ], [ 'bar' => true ] ] ],
            [ 'foo bar', [ [ 'foo' => true, 'bar' => true ] ] ],
            [ 'foo bar', [ 'foo', 'foo', 'bar' ] ],
            [ '1 2 3', [ 1, 2, 3 ] ],
            [ 'booz', [ new Stringable('booz') ] ],
        ];
    }

    /**
     * @dataProvider validClassNamesProvider
     */
    public function testThatClassnamesAreGenerated(string $expected, array $classnames): void
    {
        $this->assertSame($expected, Classnames::make(...$classnames));
    }

    public function invalidClassNamesProvider()
    {
        return [
            [ [ new stdClass ] ],
        ];
    }

    /**
     * @dataProvider invalidClassNamesProvider
     * @expectedException \Newride\Classnames\NotConvertibleTypeException
     */
    public function testThatClassnamesAreNotGenerated(array $classnames): void
    {
        Classnames::make(...$classnames);
    }
}
