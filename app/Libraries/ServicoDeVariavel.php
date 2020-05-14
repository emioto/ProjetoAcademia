<?php namespace App\Libraries;

use App\ViewModel\Aluno\VariavelViewModel;

class ServicoDeVariavel extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new VariavelViewModel(); 
    }
}