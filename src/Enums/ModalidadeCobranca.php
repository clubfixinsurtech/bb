<?php

namespace BB\Enums;

enum ModalidadeCobranca: int
{
    case SIMPLES_COM_REGISTRO = 1;
    case SIMPLES_SEM_REGISTRO = 2;
    case VINCULADA = 4;
    case DESCONTADA = 6;
    case FINANCIADA_VENDOR = 8;
}