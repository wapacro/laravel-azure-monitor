<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class Session extends Data {

    public function id(string $id = null): string|static {
        return $this->getOrSet('ai.session.id', $id) ?? $this;
    }

    public function first(bool $first = null): bool|static {
        return $this->getOrSet('ai.session.isFirst', $first) ?? $this;
    }

}
