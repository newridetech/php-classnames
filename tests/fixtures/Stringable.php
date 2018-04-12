<?php

namespace Newride\Classnames\tests\fixtures;

class Stringable
{
    public $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function __toString(): string
    {
        return $this->message;
    }
}
