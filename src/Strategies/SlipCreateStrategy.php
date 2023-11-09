<?php

namespace BB\Strategies;

use BB\Contracts\SlipInterface;
use BB\Helpers\{PropertyValidator, RequiredFields, Validator};
use BB\Entities\{BeneficiarioFinal, Desconto, JurosMora, Multa, NumeroTituloCliente, Pagador};
use BB\Enums\{CodigoModalidade, CodigoTipoTitulo, IndicadorPix, OrgaoNegativador};
use BB\Traits\{ConditionableTrait, HasPayload};

class SlipCreateStrategy implements SlipInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'numeroConvenio',
        'dataVencimento',
        'valorOriginal',
    ];

    private ?int $numeroCarteira = null;
    private ?int $numeroVariacaoCarteira = null;
    private ?CodigoModalidade $codigoModalidade = null;
    private ?string $dataEmissao = null;
    private ?float $valorAbatimento = null;
    private ?float $quantidadeDiasProtesto = null;
    private ?int $quantidadeDiasNegativacao = null;
    private ?OrgaoNegativador $orgaoNegativador = null;
    private ?string $indicadorAceiteTituloVencido = null;
    private ?int $numeroDiasLimiteRecebimento = null;
    private ?string $codigoAceite = null;
    private ?CodigoTipoTitulo $codigoTipoTitulo = null;
    private ?string $descricaoTipoTitulo = null;
    private ?string $indicadorPermissaoRecebimentoParcial = null;
    private ?string $numeroTituloBeneficiario = null;
    private ?string $campoUtilizacaoBeneficiario = null;
    private ?string $numeroTituloCliente = null;
    private ?string $mensagemBloquetoOcorrencia = null;
    private ?array $desconto = null;
    private ?array $segundoDesconto = null;
    private ?array $terceiroDesconto = null;
    private ?array $jurosMora = null;
    private ?array $multa = null;
    private ?array $pagador = null;
    private ?array $beneficiarioFinal = null;
    private ?IndicadorPix $indicadorPix = null;

    public function __construct(
        private int    $numeroConvenio,
        private string $dataVencimento,
        private float  $valorOriginal,
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

    public function getNumeroCarteira(): ?int
    {
        return $this->numeroCarteira;
    }

    public function setNumeroCarteira(int $numeroCarteira): self
    {
        $this->numeroCarteira = $numeroCarteira;
        $this->validate();
        return $this;
    }

    public function getNumeroVariacaoCarteira(): ?int
    {
        return $this->numeroVariacaoCarteira;
    }

    public function setNumeroVariacaoCarteira(int $numeroVariacaoCarteira): self
    {
        $this->numeroVariacaoCarteira = $numeroVariacaoCarteira;
        $this->validate();
        return $this;
    }

    public function getCodigoModalidade(): ?CodigoModalidade
    {
        return $this->codigoModalidade;
    }

    public function setCodigoModalidade(CodigoModalidade $codigoModalidade): self
    {
        $this->codigoModalidade = $codigoModalidade;
        $this->validate();
        return $this;
    }

    public function getDataEmissao(): ?string
    {
        return $this->dataEmissao;
    }

    public function setDataEmissao(string $dataEmissao): self
    {
        $this->dataEmissao = $dataEmissao;
        $this->validate();
        return $this;
    }

    public function getValorAbatimento(): ?float
    {
        return $this->valorAbatimento;
    }

    public function setValorAbatimento(float $valorAbatimento): self
    {
        $this->valorAbatimento = $valorAbatimento;
        $this->validate();
        return $this;
    }

    public function getQuantidadeDiasProtesto(): ?float
    {
        return $this->quantidadeDiasProtesto;
    }

    public function setQuantidadeDiasProtesto(float $quantidadeDiasProtesto): self
    {
        $this->quantidadeDiasProtesto = $quantidadeDiasProtesto;
        $this->validate();
        return $this;
    }

    public function getQuantidadeDiasNegativacao(): ?int
    {
        return $this->quantidadeDiasNegativacao;
    }

    public function setQuantidadeDiasNegativacao(int $quantidadeDiasNegativacao): self
    {
        $this->quantidadeDiasNegativacao = $quantidadeDiasNegativacao;
        $this->validate();
        return $this;
    }

    public function getOrgaoNegativador(): ?OrgaoNegativador
    {
        return $this->orgaoNegativador;
    }

    public function setOrgaoNegativador(OrgaoNegativador $orgaoNegativador): self
    {
        $this->orgaoNegativador = $orgaoNegativador;
        $this->validate();
        return $this;
    }

    public function getIndicadorAceiteTituloVencido(): ?string
    {
        return $this->indicadorAceiteTituloVencido;
    }

    public function setIndicadorAceiteTituloVencido(bool $indicadorAceiteTituloVencido): self
    {
        $this->indicadorAceiteTituloVencido = $indicadorAceiteTituloVencido ? 'S' : 'N';
        $this->validate();
        return $this;
    }

    public function getNumeroDiasLimiteRecebimento(): ?int
    {
        return $this->numeroDiasLimiteRecebimento;
    }

    public function setNumeroDiasLimiteRecebimento(int $numeroDiasLimiteRecebimento): self
    {
        $this->numeroDiasLimiteRecebimento = $numeroDiasLimiteRecebimento;
        $this->validate();
        return $this;
    }

    public function getCodigoAceite(): ?string
    {
        return $this->codigoAceite;
    }

    public function setCodigoAceite(bool $codigoAceite): self
    {
        $this->codigoAceite = $codigoAceite ? 'A' : 'N';
        $this->validate();
        return $this;
    }

    public function getCodigoTipoTitulo(): ?CodigoTipoTitulo
    {
        return $this->codigoTipoTitulo;
    }

    public function setCodigoTipoTitulo(CodigoTipoTitulo $codigoTipoTitulo): self
    {
        $this->codigoTipoTitulo = $codigoTipoTitulo;
        $this->validate();
        return $this;
    }

    public function getDescricaoTipoTitulo(): ?string
    {
        return $this->descricaoTipoTitulo;
    }

    public function setDescricaoTipoTitulo(string $descricaoTipoTitulo): self
    {
        $this->descricaoTipoTitulo = $descricaoTipoTitulo;
        $this->validate();
        return $this;
    }

    public function getIndicadorPermissaoRecebimentoParcial(): ?string
    {
        return $this->indicadorPermissaoRecebimentoParcial;
    }

    public function setIndicadorPermissaoRecebimentoParcial(bool $indicadorPermissaoRecebimentoParcial): self
    {
        $this->indicadorPermissaoRecebimentoParcial = $indicadorPermissaoRecebimentoParcial ? 'S' : 'N';
        $this->validate();
        return $this;
    }

    public function getNumeroTituloBeneficiario(): ?string
    {
        return $this->numeroTituloBeneficiario;
    }

    public function setNumeroTituloBeneficiario(string $numeroTituloBeneficiario): self
    {
        $this->numeroTituloBeneficiario = $numeroTituloBeneficiario;
        $this->validate();
        return $this;
    }

    public function getCampoUtilizacaoBeneficiario(): ?string
    {
        return $this->campoUtilizacaoBeneficiario;
    }

    public function setCampoUtilizacaoBeneficiario(string $campoUtilizacaoBeneficiario): self
    {
        $this->campoUtilizacaoBeneficiario = $campoUtilizacaoBeneficiario;
        $this->validate();
        return $this;
    }

    public function getNumeroTituloCliente(): ?string
    {
        return $this->numeroTituloCliente;
    }

    public function setNumeroTituloCliente(NumeroTituloCliente $numeroTituloCliente): self
    {
        $this->numeroTituloCliente = $numeroTituloCliente;
        $this->validate();
        return $this;
    }

    public function getMensagemBloquetoOcorrencia(): ?string
    {
        return $this->mensagemBloquetoOcorrencia;
    }

    public function setMensagemBloquetoOcorrencia(string $mensagemBloquetoOcorrencia): self
    {
        $this->mensagemBloquetoOcorrencia = $mensagemBloquetoOcorrencia;
        $this->validate();
        return $this;
    }

    public function getDesconto(): array
    {
        return $this->desconto;
    }

    public function setDesconto(Desconto $desconto): self
    {
        $this->desconto = $desconto->payload();
        $this->validate();
        return $this;
    }

    public function getSegundoDesconto(): array
    {
        return $this->segundoDesconto;
    }

    public function setSegundoDesconto(Desconto $segundoDesconto): self
    {
        $this->segundoDesconto = $segundoDesconto->payload();
        $this->validate();
        return $this;
    }

    public function getTerceiroDesconto(): array
    {
        return $this->terceiroDesconto;
    }

    public function setTerceiroDesconto(Desconto $terceiroDesconto): self
    {
        $this->terceiroDesconto = $terceiroDesconto->payload();
        $this->validate();
        return $this;
    }

    public function getJurosMora(): array
    {
        return $this->jurosMora;
    }

    public function setJurosMora(JurosMora $jurosMora): self
    {
        $this->jurosMora = $jurosMora->payload();
        $this->validate();
        return $this;
    }

    public function getMulta(): array
    {
        return $this->multa;
    }

    public function setMulta(Multa $multa): self
    {
        $this->multa = $multa->payload();
        $this->validate();
        return $this;
    }

    public function getPagador(): array
    {
        return $this->pagador;
    }

    public function setPagador(Pagador $pagador): self
    {
        $this->pagador = $pagador->payload();
        $this->validate();
        return $this;
    }

    public function getBeneficiarioFinal(): array
    {
        return $this->beneficiarioFinal;
    }

    public function setBeneficiarioFinal(BeneficiarioFinal $beneficiarioFinal): self
    {
        $this->beneficiarioFinal = $beneficiarioFinal->payload();
        $this->validate();
        return $this;
    }

    public function getIndicadorPix(): ?IndicadorPix
    {
        return $this->indicadorPix;
    }

    public function setIndicadorPix(IndicadorPix $indicadorPix): self
    {
        $this->indicadorPix = $indicadorPix;
        $this->validate();
        return $this;
    }

    public function getNumeroConvenio(): int
    {
        return $this->numeroConvenio;
    }

    public function setNumeroConvenio(int $numeroConvenio): self
    {
        $this->numeroConvenio = $numeroConvenio;
        $this->validate();
        return $this;
    }

    public function getDataVencimento(): string
    {
        return $this->dataVencimento;
    }

    public function setDataVencimento(string $dataVencimento): self
    {
        $this->dataVencimento = $dataVencimento;
        $this->validate();
        return $this;
    }

    public function getValorOriginal(): float
    {
        return $this->valorOriginal;
    }

    public function setValorOriginal(float $valorOriginal): self
    {
        $this->valorOriginal = $valorOriginal;
        $this->validate();
        return $this;
    }

    private function validateDataEmissao(): void
    {
        if ($this->dataEmissao) {
            if (!Validator::date($this->dataEmissao, 'd.m.Y')) {
                throw new \InvalidArgumentException('Data de emissão inválida');
            }
        }
    }

    private function validateDataVencimento(): void
    {
        if (!Validator::date($this->dataVencimento, 'd.m.Y')) {
            throw new \InvalidArgumentException('Data de vencimento inválida');
        }
    }

    private function validateValorOriginal(): void
    {
        if (!Validator::decimal($this->valorOriginal)) {
            throw new \InvalidArgumentException('Valor original inválido');
        }
    }

    private function validateValorAbatimento(): void
    {
        if ($this->valorAbatimento) {
            if (!Validator::decimal($this->valorAbatimento)) {
                throw new \InvalidArgumentException('Valor de abatimento inválido');
            }
        }
    }

    private function validateQuantidadeDiasProtesto(): void
    {
        if ($this->quantidadeDiasProtesto) {
            if ($this->quantidadeDiasProtesto < 0) {
                throw new \InvalidArgumentException('Quantidade de dias para protesto inválida');
            }
        }
    }

    private function validateQuantidadeDiasNegativacao(): void
    {
        if ($this->quantidadeDiasNegativacao) {
            if ($this->quantidadeDiasNegativacao < 0) {
                throw new \InvalidArgumentException('Quantidade de dias para negativação inválida');
            }
        }
    }

    private function validateNumeroDiasLimiteRecebimento(): void
    {
        if ($this->numeroDiasLimiteRecebimento) {
            if ($this->numeroDiasLimiteRecebimento <= 0) {
                throw new \InvalidArgumentException('Número de dias limite para recebimento inválido');
            }
        }
    }

    private function validateNumeroTituloBeneficiario(): void
    {
        if ($this->numeroTituloBeneficiario) {
            if (strlen($this->numeroTituloBeneficiario) > 15) {
                throw new \InvalidArgumentException('Número do título precisa ter no máximo 15 caracteres');
            }

            if (preg_match('/[^A-Z0-9]/', $this->numeroTituloBeneficiario)) {
                throw new \InvalidArgumentException('Número do título do beneficiário inválido');
            }
        }
    }

    private function validateMensagemBloquetoOcorrencia(): void
    {
        if ($this->mensagemBloquetoOcorrencia) {
            if (strlen($this->mensagemBloquetoOcorrencia) > 30) {
                throw new \InvalidArgumentException('Mensagem do bloqueto precisa ter no máximo 30 caracteres');
            }
        }
    }
}