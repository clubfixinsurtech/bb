<?php

namespace BB\Contracts;

interface SlipInterface extends HasPayloadInterface
{
    public function validate(): void;

    public function getRequired(): array;

    public function setRequired(array $required): self;
}