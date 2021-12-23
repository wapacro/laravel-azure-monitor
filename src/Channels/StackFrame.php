<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class StackFrame extends Data {

    public function assembly(string $assembly = null): string|static {
        return $this->getOrSet('assembly', $assembly) ?? $this;
    }

    public function file(string $file = null): string|static {
        return $this->getOrSet('fileName', $file) ?? $this;
    }

    public function line(int $line = null): int|static {
        return $this->getOrSet('line', $line) ?? $this;
    }

    public function method(string $method = null): string|static {
        return $this->getOrSet('method', $method) ?? $this;
    }

    public function level(int $level = null): int|static {
        return $this->getOrSet('level', $level) ?? $this;
    }

}
