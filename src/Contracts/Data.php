<?php

namespace LaravelAzMonitor\Contracts;

use BackedEnum;
use DateTimeInterface;

abstract class Data {

    protected array $data = [];

    public function serialize(): array {
        return array_map(function ($data) {
            if ($data instanceof BackedEnum) return (int)$data;
            if ($data instanceof DateTimeInterface) return $data->format(DATE_ATOM);
            return $data;
        }, $this->data);
    }

    protected function getOrSet(string $key, mixed $value): mixed {
        if (array_key_exists($key, $this->data)) return $this->data[$key];
        if ($value) $this->data[$key] = $value;
        return null;
    }

}
