<?php namespace App\Libraries;

use App\ViewModel\Aluno\TreinoViewModel;
use App\ViewModel\Aluno\TreinoCalendarioViewModel;
use App\ViewModel\Aluno\TreinoCalendarioExercicioViewModel;
use App\Models\TBL_TREINOS;
use App\Models\TBL_DIASTREINO;
use App\Models\TBL_EXERCICIOS_TRN;
use App\Models\TBL_CONCLUIDOS;
use App\Models\TBL_FASES;

class ServicoDeTreino extends ServicoPadrao
{
    private $repositorioDeTreino;
    private $repositorioDeDiaTreino;
    private $repositorioDeExerciciosTreino;
    private $repositorioDeConcluidos;
    private $repositorioDeFases;

    function __construct()
    {
        $this->repositorioDeTreino = new TBL_TREINOS();
        $this->repositorioDeDiaTreino = new TBL_DIASTREINO();
        $this->repositorioDeExerciciosTreino = new TBL_EXERCICIOS_TRN();
        $this->repositorioDeConcluidos = new TBL_CONCLUIDOS();
        $this->repositorioDeFases = new TBL_FASES();
    }

    public function Obter(int $idAluno) 
    {
        $viewModel = new TreinoViewModel();

        $viewModel->Treinos = $this->repositorioDeTreino->ObterTreinosAluno($idAluno, date('Y-m-d'));
        $idTreinoAtual = 0;
        $dias = array();
        foreach ($viewModel->Treinos as $value) {
            $idTreinoAtual = $value['TRN_ID'];
            $InicioTreino = new \DateTime($value['TRN_DATAINI']);
            $FinalTreino = new \DateTime($value['TRN_DATAFIM']);
            $FinalTreino->modify("+1 day");

            //Busca os treinos por dia da semana
            $viewModel->DiasTreinos = $this->repositorioDeDiaTreino->ObterTreinoDaSemana($idTreinoAtual);
            foreach ($viewModel->DiasTreinos as $diaSemanaTreino) {
                $dias[$diaSemanaTreino['DST_DIA']]['TipoExe'] = $diaSemanaTreino['TPE_TITULO'];
                $dias[$diaSemanaTreino['DST_DIA']]['TipoExe_Descricao'] = $diaSemanaTreino['TPE_DESCRICAO'];
                $dias[$diaSemanaTreino['DST_DIA']]['Treinos'] = [];

                //Busca os exercicios
                $viewModel->Exercicios = $this->repositorioDeExerciciosTreino->ObterExerciciosTreinoDaSemana($idTreinoAtual, $diaSemanaTreino['TPE_ID']);
                foreach ($viewModel->Exercicios as $ExeTreino) {
                    $exercicio = new TreinoCalendarioExercicioViewModel();

                    if (!empty($ExeTreino['EXE_LINK'])){
                        $exercicio->LinkExercicio = $ExeTreino['EXE_LINK'];
                    }

                    $exercicio->Descricao = $ExeTreino['EXE_TITULO'];       
                    array_push($dias[$diaSemanaTreino['DST_DIA']]['Treinos'], $exercicio);
                }
            }
            
            $interval = new \DateInterval('P1D');
            $periodo = new \DatePeriod($InicioTreino, $interval ,$FinalTreino);
            foreach ($periodo as $diasPeriodo) {
                $calendarioTreino = new TreinoCalendarioViewModel();
                $diadaSemana = $diasPeriodo->format('w') + 1;
                if (!isset($dias[$diadaSemana]['TipoExe'])) {
                    $dias[$diadaSemana]['TipoExe'] = "Off";
                    $dias[$diadaSemana]['TipoExe_Descricao'] = "Off";
                }

                //Busca Status do Treino:
                
                $viewModel->Concluidos = $this->repositorioDeConcluidos->ObterTreinoConcluido($idTreinoAtual, $diasPeriodo->format('Y-m-d'));
                foreach ($viewModel->Concluidos as $value3) {
                        $calendarioTreino->StatusTreino = $value3['CNC_STATUS'];
                }
                
                //Busca o Método e Fase desse dia:
                $viewModel->Fases = $this->repositorioDeFases->ObterFasesTreino($idTreinoAtual, $diasPeriodo->format('Y-m-d'));
                foreach ($viewModel->Fases as $value3) {
                    $calendarioTreino->Fase = "Fase {$value3['FSE_SEQUENCIA']}: {$value3['MET_TITULO']}";
                }
                

                $calendarioTreino->IdTreino = $value['TRN_ID'];         
                $calendarioTreino->Data = $diasPeriodo->format('m/d/Y');
                $calendarioTreino->Titulo = $dias[$diadaSemana]['TipoExe'];
                $calendarioTreino->Subtitulo = $dias[$diadaSemana]['TipoExe_Descricao'];
                
                if(!($calendarioTreino->Titulo == "Off"))
                    array_push($calendarioTreino->Exercicios, $dias[$diadaSemana]['Treinos']);

                array_push($viewModel->CalendarioTreinos, $calendarioTreino);
            }     
        }

        return $viewModel; 
    }
}