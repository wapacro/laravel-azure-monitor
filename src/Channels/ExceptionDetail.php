<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data;

class ExceptionDetail extends Data {

    public function id(int $id = null): int|static {
        return $this->getOrSet('id', $id) ?? $this;
    }

    public function outerId(int $outerId = null): int|static {
        return $this->getOrSet('outerId', $outerId) ?? $this;
    }

    public function typeName(string $typeName = null): string|static {
        return $this->getOrSet('typeName', $typeName) ?? $this;
    }

    public function message(string $message = null): string|static {
        return $this->getOrSet('message', $message) ?? $this;
    }

    public function hasFullStack(bool $hasFullStack = null): bool|static {
        return $this->getOrSet('hasFullStack', $hasFullStack) ?? $this;
    }

    public function stack(array $stack = null): array|static {
        return $this->getOrSet('parsedStack', $stack) ?? $this;
    }

}
