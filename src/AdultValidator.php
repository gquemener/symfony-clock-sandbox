<?php

declare(strict_types=1);

namespace Gildas\ClockDependent;

use Psr\Clock\ClockInterface;

final readonly class AdultValidator
{
    public function __construct(
        private ClockInterface $clock
    ) {
    }

    public function validate(Human $human): bool
    {
        return $this->clock->now()->diff($human->bornedAt())->y > 18;
    }
}
