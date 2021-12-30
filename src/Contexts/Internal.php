<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Internal extends Data {

    public function sdkVersion(string $sdkVersion = null): string|static {
        return $this->getOrSet('ai.internal.sdkVersion', $sdkVersion) ?? $this;
    }

    public function agentVersion(string $agentVersion = null): string|static {
        return $this->getOrSet('ai.internal.agentVersion', $agentVersion) ?? $this;
    }

    public function nodeName(string $nodeName = null): string|static {
        return $this->getOrSet('ai.internal.nodeName', $nodeName) ?? $this;
    }

}
