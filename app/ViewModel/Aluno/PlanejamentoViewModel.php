<?php namespace App\ViewModel\Aluno;

use App\ViewModel\Padrao\PadraoViewModel;

class PlanejamentoViewModel extends PadraoViewModel
{
    public $IdAluno;
    public $Aluno;
    public $Questionarios;
    public $TreinoAtivo;
    public $TreinoConcluido;
    public $DiasTreino;
    public $FaseAtual;
    public $Exercicios;
    public $ExerciciosAerobicos;

    public $DataAtual;

    public $ExisteTreinoHoje = true;
    public $TreinoAtrasado;
    public $TreinoDia;

    public $ExercicosTreino = [];
    public $ExercicoTreinoAerobico;
}

class PlanejamentoQuestionarioViewModel {
    public $Tipo;
    public $IdTipo;
    public $Titulo;
}

class PlanejamentoTreinoSemanaViewModel {
    public $Titulo;
    public $Tipo;
    public $Aerobico;
    public $IdDiaTreino;
}

class PlanejamentoTreinoAtrasadoViewModel {
    public $IdTreino;
    public $Titulo;
    public $Data;
}

class PlanejamentoTreinoDiaViewModel {
    public $IdTreino;
    public $Titulo;
    public $Data;
    public $Serie;
    public $Repeticoes;
    public $Execucao;
    public $IntervaloSeries;
    public $IntervaloExercicios;
    public $Percepcao;
}

class PlanejamentoTreinoRespostaViewModel {
    public $CNC_TRN_ID;
    public $CNC_DATA;
    public $CNC_STATUS;
}