<?php

namespace BB\Contracts;

interface HasPayloadInterface extends \JsonSerializable
{
    public function payload(): array;
}