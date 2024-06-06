<?php

declare(strict_types=1);

namespace Gildas\ClockDependent\Tests;

use DateTimeImmutable;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\MockClock;
use Gildas\ClockDependent\AdultValidator;
use Gildas\ClockDependent\Human;

final class AdultValidatorTest extends TestCase
{
    #[Test]
    public function it_validates_age_above_18(): void
    {
        $clock = new MockClock('2024-06-06');
        $validator = new AdultValidator($clock);
        $human = Human::born(new DateTimeImmutable('1987-05-14'));

        $this->assertTrue($validator->validate($human));
    }

    #[Test]
    public function it_invalidates_age_under_18(): void
    {
        $clock = new MockClock('2024-06-06');
        $validator = new AdultValidator($clock);
        $human = Human::born(new DateTimeImmutable('2020-03-23'));

        $this->assertFalse($validator->validate($human));
    }
}
