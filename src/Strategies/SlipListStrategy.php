<?php

namespace BB\Strategies;

use BB\Enums\{CodigoEstadoTituloCobranca, ContaCaucao, IndicadorSituacao, ModalidadeCobranca};
use BB\Contracts\{HasPayloadInterface, SlipInterface};
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Traits\HasPayload;

class SlipListStrategy implements HasPayloadInterface, SlipInterface
{
    use HasPayload;

    protected array $required = [
        'indicadorSituacao',
        'agenciaBeneficiario',
        'contaBeneficiario',
    ];

    private ?ContaCaucao $contaCaucao = null;
    private ?int $carteiraConvenio = null;
    private ?int $variacaoCarteiraConvenio = null;
    private ?ModalidadeCobranca $modalidadeCobranca = null;
    private ?int $cnpjPagador = null;
    private ?int $digitoCNPJPagador = null;
    private ?int $cpfPagador = null;
    private ?int $digitoCPFPagador = null;
    private ?string $dataInicioVencimento = null;
    private ?string $dataFimVencimento = null;
    private ?string $dataInicioRegistro = null;
    private ?string $dataFimRegistro = null;
    private ?string $dataInicioMovimento = null;
    private ?string $dataFimMovimento = null;
    private ?CodigoEstadoTituloCobranca $codigoEstadoTituloCobranca = null;
    private ?string $boletoVencido = null;
    private ?int $indice = null;

    public function __construct(
        private IndicadorSituacao $indicadorSituacao,
        private int               $agenciaBeneficiario,
        private int               $contaBeneficiario,
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

    public function getContaCaucao(): ?ContaCaucao
    {
        return $this->contaCaucao;
    }

    public function setContaCaucao(ContaCaucao $contaCaucao): self
    {
        $this->contaCaucao = $contaCaucao;
        $this->validate();
        return $this;
    }

    public function getCarteiraConvenio(): ?int
    {
        return $this->carteiraConvenio;
    }

    public function setCarteiraConvenio(int $carteiraConvenio): self
    {
        $this->carteiraConvenio = $carteiraConvenio;
        $this->validate();
        return $this;
    }

    public function getVariacaoCarteiraConvenio(): ?int
    {
        return $this->variacaoCarteiraConvenio;
    }

    public function setVariacaoCarteiraConvenio(int $variacaoCarteiraConvenio): self
    {
        $this->variacaoCarteiraConvenio = $variacaoCarteiraConvenio;
        $this->validate();
        return $this;
    }

    public function getModalidadeCobranca(): ?ModalidadeCobranca
    {
        return $this->modalidadeCobranca;
    }

    public function setModalidadeCobranca(ModalidadeCobranca $modalidadeCobranca): self
    {
        $this->modalidadeCobranca = $modalidadeCobranca;
        $this->validate();
        return $this;
    }

    public function getCnpjPagador(): ?int
    {
        return $this->cnpjPagador;
    }

    public function setCnpjPagador(int $cnpjPagador): self
    {
        $this->cnpjPagador = $cnpjPagador;
        $this->validate();
        return $this;
    }

    public function getDigitoCNPJPagador(): ?int
    {
        return $this->digitoCNPJPagador;
    }

    public function setDigitoCNPJPagador(int $digitoCNPJPagador): self
    {
        $this->digitoCNPJPagador = $digitoCNPJPagador;
        $this->validate();
        return $this;
    }

    public function getCpfPagador(): ?int
    {
        return $this->cpfPagador;
    }

    public function setCpfPagador(int $cpfPagador): self
    {
        $this->cpfPagador = $cpfPagador;
        $this->validate();
        return $this;
    }

    public function getDigitoCPFPagador(): ?int
    {
        return $this->digitoCPFPagador;
    }

    public function setDigitoCPFPagador(int $digitoCPFPagador): self
    {
        $this->digitoCPFPagador = $digitoCPFPagador;
        $this->validate();
        return $this;
    }

    public function getDataInicioVencimento(): ?string
    {
        return $this->dataInicioVencimento;
    }

    public function setDataInicioVencimento(string $dataInicioVencimento): self
    {
        $this->dataInicioVencimento = $dataInicioVencimento;
        $this->validate();
        return $this;
    }

    public function getDataFimVencimento(): ?string
    {
        return $this->dataFimVencimento;
    }

    public function setDataFimVencimento(string $dataFimVencimento): self
    {
        $this->dataFimVencimento = $dataFimVencimento;
        $this->validate();
        return $this;
    }

    public function getDataInicioRegistro(): ?string
    {
        return $this->dataInicioRegistro;
    }

    public function setDataInicioRegistro(string $dataInicioRegistro): self
    {
        $this->dataInicioRegistro = $dataInicioRegistro;
        $this->validate();
        return $this;
    }

    public function getDataFimRegistro(): ?string
    {
        return $this->dataFimRegistro;
    }

    public function setDataFimRegistro(string $dataFimRegistro): self
    {
        $this->dataFimRegistro = $dataFimRegistro;
        $this->validate();
        return $this;
    }

    public function getDataInicioMovimento(): ?string
    {
        return $this->dataInicioMovimento;
    }

    public function setDataInicioMovimento(string $dataInicioMovimento): self
    {
        $this->dataInicioMovimento = $dataInicioMovimento;
        $this->validate();
        return $this;
    }

    public function getDataFimMovimento(): ?string
    {
        return $this->dataFimMovimento;
    }

    public function setDataFimMovimento(string $dataFimMovimento): self
    {
        $this->dataFimMovimento = $dataFimMovimento;
        $this->validate();
        return $this;
    }

    public function getCodigoEstadoTituloCobranca(): ?CodigoEstadoTituloCobranca
    {
        return $this->codigoEstadoTituloCobranca;
    }

    public function setCodigoEstadoTituloCobranca(CodigoEstadoTituloCobranca $codigoEstadoTituloCobranca): self
    {
        $this->codigoEstadoTituloCobranca = $codigoEstadoTituloCobranca;
        $this->validate();
        return $this;
    }

    public function getBoletoVencido(): ?string
    {
        return $this->boletoVencido;
    }

    public function setBoletoVencido(bool $boletoVencido): self
    {
        $this->boletoVencido = $boletoVencido ? 'S' : 'N';
        $this->validate();
        return $this;
    }

    public function getIndice(): ?int
    {
        return $this->indice;
    }

    public function setIndice(int $indice): self
    {
        $this->indice = $indice;
        $this->validate();
        return $this;
    }

    public function getIndicadorSituacao(): IndicadorSituacao
    {
        return $this->indicadorSituacao;
    }

    public function setIndicadorSituacao(IndicadorSituacao $indicadorSituacao): self
    {
        $this->indicadorSituacao = $indicadorSituacao;
        $this->validate();
        return $this;
    }

    public function getAgenciaBeneficiario(): int
    {
        return $this->agenciaBeneficiario;
    }

    public function setAgenciaBeneficiario(int $agenciaBeneficiario): self
    {
        $this->agenciaBeneficiario = $agenciaBeneficiario;
        $this->validate();
        return $this;
    }

    public function getContaBeneficiario(): int
    {
        return $this->contaBeneficiario;
    }

    public function setContaBeneficiario(int $contaBeneficiario): self
    {
        $this->contaBeneficiario = $contaBeneficiario;
        $this->validate();
        return $this;
    }

    private function validateCnpjPagador(): void
    {
        if ($this->cnpjPagador && !$this->digitoCNPJPagador) {
            throw new \InvalidArgumentException('CNPJ do pagador informado, mas o dígito não foi informado.');
        }

        if (!$this->cnpjPagador && $this->digitoCNPJPagador) {
            throw new \InvalidArgumentException('Dígito do CNPJ do pagador informado, mas o CNPJ não foi informado.');
        }

        if ($this->cnpjPagador && $this->digitoCNPJPagador) {
            if (strlen($this->cnpjPagador) !== 12) {
                throw new \InvalidArgumentException('CNPJ do pagador deve ter 12 dígitos.');
            }

            if (strlen($this->digitoCNPJPagador) !== 2) {
                throw new \InvalidArgumentException('Dígito do CNPJ do pagador deve ter 2 dígitos.');
            }

            $fullCnpj = $this->cnpjPagador . $this->digitoCNPJPagador;
            if (!Validator::cnpj($fullCnpj)) {
                throw new \InvalidArgumentException('CNPJ do pagador inválido.');
            }
        }
    }

    private function validateCpfPagador(): void
    {
        if ($this->cpfPagador && !$this->digitoCPFPagador) {
            throw new \InvalidArgumentException('CPF do pagador informado, mas o dígito não foi informado.');
        }

        if (!$this->cpfPagador && $this->digitoCPFPagador) {
            throw new \InvalidArgumentException('Dígito do CPF do pagador informado, mas o CPF não foi informado.');
        }

        if ($this->cpfPagador && $this->digitoCPFPagador) {
            if (strlen($this->cpfPagador) !== 9) {
                throw new \InvalidArgumentException('CPF do pagador deve ter 9 dígitos.');
            }

            if (strlen($this->digitoCPFPagador) !== 2) {
                throw new \InvalidArgumentException('Dígito do CPF do pagador deve ter 2 dígitos.');
            }

            $fullCpf = $this->cpfPagador . $this->digitoCPFPagador;
            if (!Validator::cpf($fullCpf)) {
                throw new \InvalidArgumentException('CPF do pagador inválido.');
            }
        }
    }

    private function validateDataInicioVencimento(): void
    {
        if ($this->dataInicioVencimento) {
            if (!Validator::date($this->dataInicioVencimento, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de início de vencimento inválida.');
            }
        }
    }

    private function validateDataFimVencimento(): void
    {
        if ($this->dataFimVencimento) {
            if (!Validator::date($this->dataFimVencimento, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de fim de vencimento inválida.');
            }
        }
    }

    private function validateDataInicioRegistro(): void
    {
        if ($this->dataInicioRegistro) {
            if (!Validator::date($this->dataInicioRegistro, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de início de registro inválida.');
            }
        }
    }

    private function validateDataFimRegistro(): void
    {
        if ($this->dataFimRegistro) {
            if (!Validator::date($this->dataFimRegistro, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de fim de registro inválida.');
            }
        }
    }

    private function validateDataInicioMovimento(): void
    {
        if ($this->dataInicioMovimento) {
            if (!Validator::date($this->dataInicioMovimento, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de início de movimento inválida.');
            }
        }
    }

    private function validateDataFimMovimento(): void
    {
        if ($this->dataFimMovimento) {
            if (!Validator::date($this->dataFimMovimento, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de fim de movimento inválida.');
            }
        }
    }
}