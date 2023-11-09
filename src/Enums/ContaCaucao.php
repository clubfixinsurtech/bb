<?php

namespace BB\Enums;

enum ContaCaucao: int
{
    case COMPOE_GARANTIA = 1;
    case NAO_COMPOE_GARANTIA = 2;
    case NAO_COMPOE_GARANTIA_VENCIMENTO_SUPERIOR_180_DIAS = 4;
    case NAO_COMPOE_GARANTIA_VEDADO = 5;
    case EM_ANALISE = 6;
    case EM_ANALISE_2 = 7;
    case NAO_COMPOE_GARANTIA_2 = 8;
}