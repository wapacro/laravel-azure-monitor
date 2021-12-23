<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class Exception extends Data {

    public function __construct() {
        $this->envelopeType = 'Microsoft.ApplicationInsights.Exception';
        $this->dataType = 'ExceptionData';
        $this->data['ver'] = 2;
    }

    public function exceptions(array $exceptions = null): array|static {
        return $this->getOrSet('exceptions', $exceptions) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

    public function measurements(array $measurements = null): array|static {
        return $this->getOrSet('measurements', $measurements) ?? $this;
    }

}
