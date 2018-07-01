<?php

namespace Newride\Classnames\tests;

use Newride\Classnames\BEM;
use PHPUnit\Framework\TestCase;

class BEMTest extends TestCase
{
    public function testThatNullModifierDoesNothing()
    {
        $this->assertSame('foo', BEM::modifier('foo', null));
    }

    public function testThatStringModifierCopiesClass()
    {
        $this->assertSame('foo', BEM::modifier('foo', ''));
    }

    public function testThatModifierGeneratesClass()
    {
        $this->assertSame('foo foo--bar', BEM::modifier('foo', 'bar'));
    }

    public function testThatClassnamesStyleCanBeUsed()
    {
        $this->assertSame('foo foo--bar foo--booz', BEM::modifier('foo', [
            'bar' => true,
            'baz' => false,
            'booz' => true,
        ]));
    }
}
