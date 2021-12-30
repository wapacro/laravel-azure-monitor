<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Device extends Data {

    public function id(string $id = null): string|static {
        return $this->getOrSet('ai.device.id', $id) ?? $this;
    }

    public function locale(string $locale = null): string|static {
        return $this->getOrSet('ai.device.locale', $locale) ?? $this;
    }

    public function model(string $model = null): string|static {
        return $this->getOrSet('ai.device.model', $model) ?? $this;
    }

    public function oemName(string $oemName = null): string|static {
        return $this->getOrSet('ai.device.oemName', $oemName) ?? $this;
    }

    public function osVersion(string $osVersion = null): string|static {
        return $this->getOrSet('ai.device.osVersion', $osVersion) ?? $this;
    }

    public function type(string $type = null): string|static {
        return $this->getOrSet('ai.device.type', $type) ?? $this;
    }

}
