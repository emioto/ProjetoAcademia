<?php namespace App\Libraries;

use App\ViewModel\CupomViewModel;
use App\Models\TBL_COMPRAS;

class ServicoDeCompra extends ServicoPadrao
{
    private $repositorioDeCompras;

    function __construct()
    {
        $this->repositorioDeCompras = new TBL_COMPRAS();
    }

    public function Inserir($compra) 
    {
        return $this->repositorioDeCompras->Inserir($compra); 
    }
}