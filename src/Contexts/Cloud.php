<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Cloud extends Data {

    public function role(string $role = null): string|static {
        return $this->getOrSet('ai.cloud.role', $role) ?? $this;
    }

    public function instance(string $instance = null): string|static {
        return $this->getOrSet('ai.cloud.roleInstance', $instance) ?? $this;
    }

}
