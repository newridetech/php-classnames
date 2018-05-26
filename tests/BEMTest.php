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

    public function testThatModifierGeneratesClass()
    {
        $this->assertSame('foo foo--bar', BEM::modifier('foo', 'bar'));
    }

    public function testThatStringModifierCopiesClass()
    {
        // it's still a strong? who am I to guess the user intentions :P
        $this->assertSame('foo foo--', BEM::modifier('foo', ''));
    }
}
