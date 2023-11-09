<?php

namespace BB\Enums;

enum JurosMoraTipo: int
{
    case DISPENSAR = 0;
    case VALOR_DIA_ATRASO = 1;
    case TAXA_MENSAL = 2;
    case ISENTO = 3;
}