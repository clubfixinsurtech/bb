<?php

namespace BB\Traits;

use BB\Helpers\ReflectionalProperties;

trait HasPayload
{
    public function payload(): array
    {
        return ReflectionalProperties::filledProperties($this);
    }

    public function jsonSerialize(): array
    {
        return $this->payload();
    }

    public function __toString(): string
    {
        return json_encode($this->payload());
    }
}
