<?php

declare(strict_types=1);

namespace App\Bundle\SwooleBundle\Component;

use Swoole\Atomic;

final class AtomicCounter
{
    private $counter;

    private function __construct(Atomic $counter)
    {
        $this->counter = $counter;
    }

    public function increment(): void
    {
        $this->counter->add(1);
    }

    public function get(): int
    {
        return $this->counter->get();
    }

    public static function fromZero(): self
    {
        return new self(new Atomic(0));
    }
}
