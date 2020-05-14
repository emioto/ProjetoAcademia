<?php namespace App\Libraries;

use App\ViewModel\Aluno\ResultadoViewModel;

class ServicoDeResultado extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new ResultadoViewModel(); 
    }
}