<?php

namespace LaravelAzMonitor\Channels;

use DateTimeImmutable;
use LaravelAzMonitor\Contracts\Data;

class Dependency extends Data {

    public function __construct() {
        $this->data['ver'] = 2;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function type(string $type = null): string|static {
        return $this->getOrSet('type', $type) ?? $this;
    }

    public function command(string $command = null): string|static {
        return $this->getOrSet('command', $command) ?? $this;
    }

    public function startTime(DateTimeImmutable $start = null): DateTimeImmutable|static {
        return $this->getOrSet('start', $start) ?? $this;
    }

    public function duration(float $duration = null): float|static {
        return $this->getOrSet('duration', $duration) ?? $this;
    }

    public function successful(bool $success = null): bool|static {
        return $this->getOrSet('success', $success) ?? $this;
    }

    public function resultCode(int $result = null): int|static {
        return $this->getOrSet('resultCode', $result) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

}
