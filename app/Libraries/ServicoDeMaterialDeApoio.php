<?php namespace App\Libraries;

use App\ViewModel\Aluno\MaterialDeApoioViewModel;

class ServicoDeMaterialDeApoio extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new MaterialDeApoioViewModel(); 
    }
}