<?php

declare(strict_types=1);

namespace Laraben\Vat;

use InvalidArgumentException;
use DateTimeInterface;

/**
 * Class Period
 *
 * @package Laraben\Vat
 * @internal
 */
class Period
{
    private $effectiveFrom;
    private $rates = [];

    public function __construct(DateTimeInterface $effectiveFrom, array $rates)
    {
        $this->effectiveFrom = $effectiveFrom;
        $this->rates = $rates;
    }

    public function getEffectiveFrom() : DateTimeInterface
    {
        return $this->effectiveFrom;
    }

    public function getRate(string $level) : float
    {
        if (!isset($this->rates[$level])) {
            throw new InvalidArgumentException("Invalid rate level: {$level}");
        }

        return $this->rates[$level];
    }

    public function getRates() : array
    {
        if (!isset($this->rates)) {
            throw new InvalidArgumentException("No rates found");
        }

        return $this->rates;

    }
}
