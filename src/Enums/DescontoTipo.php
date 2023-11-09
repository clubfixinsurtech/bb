<?php

namespace BB\Enums;

enum DescontoTipo: int
{
    case SEM_DESCONTO = 0;
    case VLR_FIXO_ATE_A_DATA_INFORMADA = 1;
    case PERCENTUAL_ATE_A_DATA_INFORMADA = 2;
    case DESCONTO_POR_DIA_DE_ANTECIPACAO = 3;
}