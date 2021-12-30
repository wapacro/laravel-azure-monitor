<?php

namespace LaravelAzMonitor\Contracts;

use BackedEnum;
use DateTimeImmutable;
use DateTimeInterface;

abstract class Data {

    protected array $data = [];
    protected string $envelopeType;
    protected string $dataType;
    protected DateTimeImmutable $time;

    public function getEnvelopeType(): string {
        return $this->envelopeType;
    }

    public function getDataType(): string {
        return $this->dataType;
    }

    public function getTime(): DateTimeImmutable {
        return $this->time ?? new DateTimeImmutable();
    }

    public function setTime(DateTimeImmutable $time): void {
        $this->time = $time;
    }

    public function serialize(): array {
        return array_map(function ($data) {
            if ($data instanceof BackedEnum) return (int)$data;
            if ($data instanceof DateTimeInterface) return $data->format(DATE_ATOM);
            return $data;
        }, array_filter($this->data));
    }

    protected function getOrSet(string $key, mixed $value): mixed {
        if (array_key_exists($key, $this->data) && is_null($value)) return $this->data[$key];
        if (!is_null($value)) $this->data[$key] = $value;
        return null;
    }

}
