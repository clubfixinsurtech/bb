<?php

namespace BB\Traits;

namespace BB\Helpers\ReflectionalProperties;

trait HasPayload
{
    public function payload():array
    {
        return ReflectionalProperties::filledProperties($this);
    }

    public function jsonSerialize()
    {
        return $this->payload();
    }
}