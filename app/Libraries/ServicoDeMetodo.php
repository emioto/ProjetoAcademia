<?php namespace App\Libraries;

use App\ViewModel\Aluno\MetodoViewModel;

class ServicoDeMetodo extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new MetodoViewModel(); 
    }
}