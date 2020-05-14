<?php namespace App\Libraries;

use App\ViewModel\Aluno\CursoViewModel;

class ServicoDeCurso extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new CursoViewModel(); 
    }
}