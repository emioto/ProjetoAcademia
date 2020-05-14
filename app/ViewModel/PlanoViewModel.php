<?php namespace App\ViewModel;

use App\ViewModel\Padrao\PadraoViewModel;

class PlanoViewModel extends PadraoViewModel
{
    public $Titulo;
    public $Valor;
    public $Detalhes;

    public $Validade;
    public $DataInicio;
    public $DataFim;
}