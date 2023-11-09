<?php

namespace BB\Enums;

enum ModalidadeJuroAplicado: int
{
    case VALOR_DIAS_CORRIDOS = 1;
    case PERCENTUAL_AO_DIA_DIAS_CORRIDOS = 2;
    case PERCENTUAL_AO_MES_DIAS_CORRIDOS = 3;
    case PERCENTUAL_AO_ANO_DIAS_CORRIDOS = 4;
    case VALOR_DIAS_UTEIS = 5;
    case PERCENTUAL_AO_DIA_DIAS_UTEIS = 6;
    case PERCENTUAL_AO_MES_DIAS_UTEIS = 7;
    case PERCENTUAL_AO_ANO_DIAS_UTEIS = 8;
}