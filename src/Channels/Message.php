<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;
use LaravelAzMonitor\Contracts\SeverityLevel;

class Message extends Data {

    public function message(string $message = null): string|static {
        return $this->getOrSet('message', $message) ?? $this;
    }

    public function severity(SeverityLevel $severity = null): SeverityLevel|static {
        return $this->getOrSet('severity', $severity) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

}
