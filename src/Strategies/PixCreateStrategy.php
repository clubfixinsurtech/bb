<?php

namespace BB\Strategies;

use BB\Contracts\PixInterface;
use BB\Entities\{Calendario, Devedor, InfoAdicionais, Loc, Valor};
use BB\Helpers\{PixKeyValidator, PropertyValidator, RequiredFields};
use BB\Traits\{ConditionableTrait, HasPayload};

class PixCreateStrategy implements PixInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'calendario',
        'valor',
        'chave',
    ];

    private ?array $calendario = null;
    private ?array $valor = null;
    private ?string $chave = null;
    private ?array $loc = null;
    private ?array $devedor = null;
    private ?string $solcnpjitacaoPagador = null;
    private ?string $solicitacaoPagador = null;
    private ?array $infoAdicionais = null;

    public function __construct()
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

    public function setRequired(array $required): PixCreateStrategy
    {
        $this->required = $required;
        return $this;
    }

    public function getCalendario(): array
    {
        return $this->calendario;
    }

    public function setCalendario(Calendario $calendario): self
    {
        $this->calendario = $calendario->payload();
        $this->validate();
        return $this;
    }

    public function getValor(): array
    {
        return $this->valor;
    }

    public function setValor(Valor $valor): self
    {
        $this->valor = $valor->payload();
        $this->validate();
        return $this;
    }

    public function getChave(): string
    {
        return $this->chave;
    }

    public function setChave(string $chave): self
    {
        $this->chave = $chave;
        $this->validate();
        return $this;
    }

    public function getLoc(): ?array
    {
        return $this->loc;
    }

    public function setLoc(Loc $loc): self
    {
        $this->loc = $loc->payload();
        $this->validate();
        return $this;
    }

    public function getDevedor(): ?array
    {
        return $this->devedor;
    }

    public function setDevedor(Devedor $devedor): self
    {
        $this->devedor = $devedor->payload();
        $this->validate();
        return $this;
    }

    public function getSolcnpjitacaoPagador(): ?string
    {
        return $this->solcnpjitacaoPagador;
    }

    public function setSolcnpjitacaoPagador(string $solcnpjitacaoPagador): self
    {
        $this->solcnpjitacaoPagador = $solcnpjitacaoPagador;
        $this->validate();
        return $this;
    }

    public function getSolicitacaoPagador(): ?string
    {
        return $this->solicitacaoPagador;
    }

    public function setSolicitacaoPagador(string $solicitacaoPagador): self
    {
        $this->solicitacaoPagador = $solicitacaoPagador;
        $this->validate();
        return $this;
    }

    public function getInfoAdicionais(): ?array
    {
        return $this->infoAdicionais;
    }

    public function setInfoAdicionais(InfoAdicionais $infoAdicionais): self
    {
        $this->infoAdicionais[] = $infoAdicionais->payload();
        $this->validate();
        return $this;
    }

    private function validateChave(): void
    {
        if ($this->chave) {
            PixKeyValidator::validatePixKey($this->chave);
        }
    }

    private function validateSolicitacaoPagador(): void
    {
        if ($this->solicitacaoPagador) {
            if (strlen($this->solicitacaoPagador) > 140) {
                throw new \InvalidArgumentException('SolicitacaoPagador deve ter no máximo 140 caracteres');
            }
        }
    }
}