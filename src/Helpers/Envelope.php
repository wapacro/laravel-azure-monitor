<?php

namespace LaravelAzMonitor\Helpers;

use DateTimeImmutable;
use LaravelAzMonitor\Contracts\Data;

class Envelope extends Data {

    public function __construct() {
        $this->data['ver'] = 1;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function time(DateTimeImmutable $time = null): DateTimeImmutable|static {
        return $this->getOrSet('time', $time) ?? $this;
    }

    public function sampleRate(float $sampleRate = null): float|static {
        return $this->getOrSet('sampleRate', $sampleRate) ?? $this;
    }

    public function sequence(string $sequence = null): string|static {
        return $this->getOrSet('seq', $sequence) ?? $this;
    }

    public function instrumentationKey(string $instrumentationKey = null): string|static {
        return $this->getOrSet('iKey', $instrumentationKey) ?? $this;
    }

    public function tags(array $tags = null): array|static {
        return $this->getOrSet('tags', $tags) ?? $this;
    }

    public function data(array $data = null): array|static {
        return $this->getOrSet('data', $data) ?? $this;
    }

}
