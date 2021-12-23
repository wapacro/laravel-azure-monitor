<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class Event extends Data {

    public function __construct() {
        $this->envelopeType = 'Microsoft.ApplicationInsights.Event';
        $this->dataType = 'EventData';
        $this->data['ver'] = 2;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

    public function measurements(array $measurements = null): array|static {
        return $this->getOrSet('measurements', $measurements) ?? $this;
    }

}
