<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Location extends Data {

    public function ip(string $ip = null): string|static {
        return $this->getOrSet('ai.location.ip', $ip) ?? $this;
    }

}
