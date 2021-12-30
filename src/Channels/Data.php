<?php

namespace LaravelAzMonitor\Channels;

use LaravelAzMonitor\Contracts\Data as DataContract;

class Data extends DataContract {

    public function type(string $type = null): string|static {
        return $this->getOrSet('baseType', $type) ?? $this;
    }

    public function data(DataContract $data = null): DataContract|static {
        return $this->getOrSet('baseData', $data) ?? $this;
    }

}
