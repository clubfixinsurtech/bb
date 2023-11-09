<?php

namespace BB\Enums;

enum MultaTipo: int
{
    case DISPENSAR = 0;
    case VALOR_FIXO = 1;
    case PERCENTUAL = 2;
}