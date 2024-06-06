<?php

declare(strict_types=1);

namespace Gildas\ClockDependent;

use DateTimeImmutable;

final class Human
{
    private function __construct(private DateTimeImmutable $bornedAt)
    {
    }

    public static function born(DateTimeImmutable $bornedAt): self
    {
        return new self($bornedAt);
    }

    public function bornedAt(): DateTimeImmutable
    {
        return $this->bornedAt;
    }
}
