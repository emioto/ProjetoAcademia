<?php namespace App\Libraries;

use App\ViewModel\Aluno\ExercicioViewModel;

class ServicoDeExercicio extends ServicoPadrao
{
    public function Obter(int $idAluno) 
    {
        return new ExercicioViewModel(); 
    }
}