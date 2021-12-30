<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Application extends Data {

    public function version(string $version = null): string|static {
        return $this->getOrSet('ai.application.ver', $version) ?? $this;
    }

}
