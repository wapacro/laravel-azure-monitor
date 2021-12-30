<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Operation extends Data {

    public function id(string $id = null): string|static {
        return $this->getOrSet('ai.operation.id', $id) ?? $this;
    }

    public function parentId(string $parentId = null): string|static {
        return $this->getOrSet('ai.operation.parentId', $parentId) ?? $this;
    }

    public function name(string $name = null): string|static {
        return $this->getOrSet('ai.operation.name', $name) ?? $this;
    }

    public function syntheticSource(string $syntheticSource = null): string|static {
        return $this->getOrSet('ai.operation.syntheticSource', $syntheticSource) ?? $this;
    }

    public function correlationVector(string $correlationVector = null): string|static {
        return $this->getOrSet('ai.operation.correlationVector', $correlationVector) ?? $this;
    }

}
