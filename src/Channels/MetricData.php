<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class MetricData extends Data {

    public function __construct() {
        $this->envelopeType = 'Microsoft.ApplicationInsights.Metric';
        $this->dataType = 'MetricData';
        $this->data['ver'] = 2;
    }

    public function metrics(array $metrics = null): array|static {
        return $this->getOrSet('metrics', $metrics) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

}
