<?php

namespace BB\Entities;

use BB\Contracts\HasPayloadInterface;
use BB\Helpers\{PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class Loc implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'id'
    ];

    public function __construct(
        private ?int $id = null,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        PropertyValidator::validate($this);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): self
    {
        $this->required = $required;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        $this->validate();
        return $this;
    }
}