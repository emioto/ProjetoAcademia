<?php namespace App\Libraries;

use App\ViewModel\PlanoViewModel;
use App\Models\TBL_PLANO;

class ServicoDePlano extends ServicoPadrao
{
    private $repositorioDePlano;

    function __construct()
    {
        $this->repositorioDePlano = new TBL_PLANO();
    }

    public function Obter($id) 
    {
        $viewModel = new PlanoViewModel();
        $plano = $this->repositorioDePlano->Obter($id)->getRow();

        $viewModel->Id = $plano->PLN_ID;
        $viewModel->Titulo =  $plano->PLN_TITULO;
        $viewModel->Detalhes = $plano->PLN_DESCRICAO;
        $viewModel->Valor = $plano->PLN_VALOR;
        $viewModel->Validade = $plano->PLN_VALIDADE;
        $viewModel->DataInicio = $plano->PLN_DATAINICIO;
        $viewModel->DataFim = $plano->PLN_DATAFINAL;

        return $viewModel; 
    }
}