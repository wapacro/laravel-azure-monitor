<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class PageView extends Data {

    public function __construct() {
        $this->envelopeType = 'Microsoft.ApplicationInsights.PageView';
        $this->dataType = 'PageViewData';
        $this->data['ver'] = 2;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function url(string $url = null): string|static {
        return $this->getOrSet('url', $url) ?? $this;
    }

    public function duration(float $duration = null): float|static {
        return $this->getOrSet('duration', $duration) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

    public function measurements(array $measurements = null): array|static {
        return $this->getOrSet('measurements', $measurements) ?? $this;
    }

}
