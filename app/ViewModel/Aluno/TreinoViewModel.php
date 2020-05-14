<?php namespace App\ViewModel\Aluno;

use App\ViewModel\Padrao\PadraoViewModel;

class TreinoViewModel extends PadraoViewModel
{
    public $Treinos;
    public $DiasTreinos;
    public $Exercicios;
    public $Concluidos;
    public $Fases;

    public $CalendarioTreinos = [];
}

class TreinoCalendarioViewModel {
    public $Data;
    public $DataSemana;
    public $IdTreino;

    public $Fase;
    public $Titulo;
    public $TipoExercicio;
    public $StatusTreino;
    public $Exercicios = [];
}

class TreinoCalendarioExercicioViewModel {
    public $Descricao;
    public $LinkExercicio;
}