<?php

namespace LaravelAzMonitor\Channels;

use DateTimeImmutable;
use LaravelAzMonitor\Contracts\Data;

class Request extends Data {

    public function __construct() {
        $this->envelopeType = 'Microsoft.ApplicationInsights.Request';
        $this->dataType = 'RequestData';
        $this->data['ver'] = 2;
    }

    public function id(string $id = null): string|static {
        return $this->getOrSet('id', $id) ?? $this;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function url(string $url = null): string|static {
        return $this->getOrSet('url', $url) ?? $this;
    }

    public function startTime(DateTimeImmutable $startTime = null): DateTimeImmutable|static {
        return $this->getOrSet('startTime', $startTime) ?? $this;
    }

    public function duration(float $duration = null): float|static {
        return $this->getOrSet('duration', $duration) ?? $this;
    }

    public function successful(bool $success = null): bool|static {
        return $this->getOrSet('success', $success) ?? $this;
    }

    public function resultCode(int $result = null): int|static {
        return $this->getOrSet('result', $result) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

    public function measurements(array $measurements = null): array|static {
        return $this->getOrSet('measurements', $measurements) ?? $this;
    }

}
