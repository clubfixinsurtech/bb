<?php

namespace BB\Contracts;

interface PixInterface extends HasPayloadInterface
{
    public function validate(): void;

    public function getRequired(): array;

    public function setRequired(array $required): self;
}