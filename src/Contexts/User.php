<?php

namespace LaravelAzMonitor\Contexts;

use LaravelAzMonitor\Contracts\Data;

class User extends Data {

    public function accountId(string $accountId = null): string|static {
        return $this->getOrSet('ai.user.accountId', $accountId) ?? $this;
    }

    public function anonymousUserId(string $anonymousUserId = null): string|static {
        return $this->getOrSet('ai.user.id', $anonymousUserId) ?? $this;
    }

    public function authenticatedUserId(string $authenticatedUserId = null): string|static {
        return $this->getOrSet('ai.user.authUserId', $authenticatedUserId) ?? $this;
    }

}
