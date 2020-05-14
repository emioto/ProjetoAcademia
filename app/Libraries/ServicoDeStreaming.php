<?php namespace App\Libraries;

use App\ViewModel\Aluno\StreamingViewModel;

class ServicoDeStreaming extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new StreamingViewModel(); 
    }
}