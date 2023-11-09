<?php

namespace BB\Enums;

enum ModalidadeAbatimentoAplicado: int
{
    case VALOR_FIXO = 1;
    case PERCENTUAL = 2;
}