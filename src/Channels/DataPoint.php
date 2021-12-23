<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;
use LaravelAzMonitor\Contracts\DataPointType;

class DataPoint extends Data {

    public function name(string $name = null): string|static {
        return $this->getOrSet('name', $name) ?? $this;
    }

    public function value(float $value = null): float|static {
        return $this->getOrSet('value', $value) ?? $this;
    }

    public function type(DataPointType $type = null): DataPointType|static {
        return $this->getOrSet('kind', $type) ?? $this;
    }

    public function count(int $count = null): int|static {
        return $this->getOrSet('count', $count) ?? $this;
    }

    public function min(float $min = null): float|static {
        return $this->getOrSet('min', $min) ?? $this;
    }

    public function max(float $max = null): float|static {
        return $this->getOrSet('max', $max) ?? $this;
    }

    public function standardDeviation(float $stdDev = null): float|static {
        return $this->getOrSet('stdDev', $stdDev) ?? $this;
    }

    public function properties(array $properties = null): array|static {
        return $this->getOrSet('properties', $properties) ?? $this;
    }

}
