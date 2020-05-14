<?php namespace App\Libraries;

use App\ViewModel\CupomViewModel;
use App\Models\TBL_CUPONS;

class ServicoDeCupom extends ServicoPadrao
{
    private $repositorioDeCupons;

    function __construct()
    {
        $this->repositorioDeCupons = new TBL_CUPONS();
    }

    public function Obter($codigo) 
    {
        $viewModel = new CupomViewModel();
        $cupom = $this->repositorioDeCupons->Obter($codigo)->getRow();

        if(isset($cupom))
        {
            $viewModel->Codigo = $cupom->CPN_CODIGO;
            $viewModel->Descricao = $cupom->CPN_DESCRICAO;
            $viewModel->Valor = $cupom->CPN_DESCONTO;
        }

        return $viewModel; 
    }
}