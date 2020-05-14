<?php namespace App\Libraries;

use App\Models\TBL_ALUNOS;
use App\Models\TBL_COMPRAS;
use App\Models\TBL_CONCLUIDOS;
use App\Models\TBL_DIASTREINO;
use App\Models\TBL_EXERCICIOS;
use App\Models\TBL_EXERCICIOS_TRN;
use App\Models\TBL_FASES;
use App\Models\TBL_QUESTIONARIO;
use App\Models\TBL_TREINOS;
use App\Models\TBL_TIPOEXERCICIO;
use App\ViewModel\Aluno\PlanejamentoViewModel;
use App\ViewModel\Aluno\PlanejamentoQuestionarioViewModel;
use App\ViewModel\Aluno\PlanejamentoTreinoSemanaViewModel;
use App\ViewModel\Aluno\PlanejamentoTreinoAtrasadoViewModel;
use App\ViewModel\Aluno\PlanejamentoTreinoDiaViewModel;

class ServicoDePlanejamento extends ServicoPadrao
{
    private $repositorioDeAluno;
    private $repositorioDeQuestionario;
    private $repositorioDeTreino;
    private $repositorioDeTreinoConcluido;
    private $repositorioDeDiasTreino;
    private $repositorioDeFases;
    private $repositorioDeExercicios;
    private $repositorioDeExerciciosTreino;
    private $repositorioDeTipoDeExercicios;

    function __construct()
    {
        $this->repositorioDeAluno = new TBL_ALUNOS();
        $this->repositorioDeQuestionario = new TBL_QUESTIONARIO();
        $this->repositorioDeTreino = new TBL_TREINOS();
        $this->repositorioDeTreinoConcluido = new TBL_CONCLUIDOS();
        $this->repositorioDeDiasTreino = new TBL_DIASTREINO();
        $this->repositorioDeFases = new TBL_FASES();
        $this->repositorioDeExercicios = new TBL_EXERCICIOS();
        $this->repositorioDeExerciciosTreino = new TBL_EXERCICIOS_TRN();
        $this->repositorioDeTipoDeExercicios = new TBL_TIPOEXERCICIO();
    }

    public function Obter(int $idAluno) 
    {
        $aluno = $this->repositorioDeAluno->Obter($idAluno);
        $planejamentoViewModel = new PlanejamentoViewModel();

        $dataHoje = new \DateTime();
        $datapesq = new \DateTime();
        $datapesq->add(new \DateInterval('P7D'));
        $planejamentoViewModel->Questionarios = $this->repositorioDeQuestionario->ObterQuestionarioAluno($idAluno, $datapesq->format('Y-m-d'));
    
        $tipoQuest[1] = "Objetivos e Preferências de treino";
        $tipoQuest[2] = "Pesquisa de Satisfação - Venda";
        $tipoQuest[3] = "Pesquisa de Satisfação - Treino";
        $tipoQuest[4] = "Pesquisa de Satisfação - Programa de Treinamento";

        foreach ($planejamentoViewModel->Questionarios as $value) {
            $questionario = new PlanejamentoQuestionarioViewModel();

            $questionario->IdTipo = $value['QST_TIPO'];
            $questionario->Tipo = $tipoQuest[$questionario->IdTipo];
            $questionario->Titulo = $value['PLN_TITULO'];
        }

        //Busca o treino ativo
        $datapesq = new \DateTime();
        $planejamentoViewModel->TreinoAtivo = $this->repositorioDeTreino->ObterTreinosPlanejamento($idAluno, $datapesq->format("Y-m-d"));

        $idTreinoAtual = 0;
        foreach ($planejamentoViewModel->TreinoAtivo as $value) {
            $idTreinoAtual = $value['TRN_ID'];
            $UltimoTreino = $value['TRN_DATAINI'];
            $trnDataIni = new \DateTime($value['TRN_DATAINI']);
            if (strtotime($UltimoTreino) < strtotime('2019-01-05'))
                $datapesq = new \DateTime('2019-01-05');
            else
                $datapesq = new \DateTime($UltimoTreino);
        }

        if ($idTreinoAtual != 0) 
        {
            //Busca o dia em que o aluno parou de treinar       
            $planejamentoViewModel->TreinoConcluido = $this->repositorioDeTreinoConcluido->ObterUltimoTreinoAluno($idTreinoAtual);
            foreach ($planejamentoViewModel->TreinoConcluido as $value2) {
                $UltimoTreino = $value2['CNC_DATA'];
                $datapesq = new \DateTime($UltimoTreino);
                $datapesq->modify("+1 day");
            }
            //Busca o treino do dia da semana atual
            $diaSemana = $datapesq->format("w") + 1;

            $planejamentoViewModel->DiasTreino = $this->repositorioDeDiasTreino->ObterTreinoDaSemanaDoTreinoAtual($diaSemana, $idTreinoAtual);
            $trnHoje['TipoExe'] = "OFF";
            foreach ($planejamentoViewModel->DiasTreino as $value) {
                $treinoSemana = new PlanejamentoTreinoSemanaViewModel();

                $treinoSemana->Titulo = $value['TPE_TITULO'];
                $treinoSemana->Tipo = $value['TPE_ID'];
                $treinoSemana->Aerobico = $value['TPE_FLEAEROBIO'];
                $treinoSemana->IdDiaTreino = $value['DST_ID'];

                $trnHoje['TipoExe'] = $value['TPE_TITULO'];
                $trnHoje['TipoExeID'] = $value['TPE_ID'];
                $trnHoje['TipoFlgAero'] = $value['TPE_FLEAEROBIO'];
                $trnHoje['IdDiaTreino'] = $value['DST_ID'];
            }

            if ($trnHoje['TipoExe'] != "OFF")
            {
                //busca a fase atual
                $planejamentoViewModel->FaseAtual = $this->repositorioDeFases->ObterFaseAtual($idTreinoAtual, $datapesq->format("Y-m-d"));
                foreach ($planejamentoViewModel->FaseAtual as $value) {
                    $trnHoje['Metodo'] = $value['MET_TITULO'];
                    $trnHoje['IDMetodo'] = $value['MET_ID'];
                    $trnHoje['FSE_INTERVALOEX'] = $value['FSE_INTERVALOEX'];
                    $trnHoje['FSE_INTERVALOSERIE'] = $value['FSE_INTERVALOSERIE'];
                    $trnHoje['FSE_ESFORCO'] = $value['FSE_ESFORCO'];
                    $trnHoje['FSE_VLE'] = $value['VLE_TITULO'];
                    $trnHoje['FSE_REP'] = $value['REP_TITULO'];
                    $trnHoje['FSE_NUMSERIE'] = $value['FSE_NUMSERIE'];
                    $trnHoje['FSE_ID'] = $value['FSE_ID'];
                }
                $trnHoje['EXERCICIOS_LISTA'] = "";
                
                //Busca Quantidade de Exercicios
                $TotalExercicios = $this->repositorioDeExerciciosTreino->ObterExerciciosQuantidade($idTreinoAtual, $trnHoje['TipoExeID'], $trnHoje['FSE_ID']);
                $TotalExercicios = $TotalExercicios->field_count;
                //Busca Exercicios de Aeróbio
                $aerobicos = $this->repositorioDeExerciciosTreino->ObterExerciciosAerobicoQuantidade($idTreinoAtual, $trnHoje['TipoExeID']);
                $TotalExerciciosAerobio = $aerobicos->field_count;
                $vayAerobios = array();
                foreach($aerobicos as $valaerobios) 
                {
                    if(isset($valaerobios['EXETRN_EXE_ID']))
                        $vayAerobios[$valaerobios['EXETRN_EXE_ID']] = $valaerobios['EXETRN_EXE_ID'];
                }
                $TotalExercicios -= $TotalExerciciosAerobio;
                if ($TotalExercicios > 0) {
                    $exercicios = $this->repositorioDeExercicios->ObterExercicios($idTreinoAtual, $trnHoje['TipoExeID']);
                    foreach ($exercicios as $value) {
                        if (!in_array($value['EXETRN_EXE_ID'], $vayAerobios)) 
                        {
                            $exercicioTreino = new \stdClass();
                            $exercicioTreino->EXE_LINK = $value['EXE_LINK'];
                            $exercicioTreino->EXE_TITULO = $value['EXE_TITULO'];

                            array_push($planejamentoViewModel->ExercicosTreino, $exercicioTreino);
                        }
                    }
                }
                if ($TotalExerciciosAerobio > 0)
                {
                    $trnHoje['tblAero'] = "";
                    $trnHojeEx[] = array();

                    $tipoExercicio = $this->repositorioDeTipoDeExercicios->ObterTipoExercicio($idTreinoAtual);
                    $contAerobio = 0;
                    foreach ($tipoExercicio as $value01) {
                        $contAerobio ++;
                        if ($value01['DST_DIA'] == $diaSemana) 
                        {
                            $TipoExId = $value01['TPE_ID'];
                            $resultado = $this->repositorioDeExerciciosTreino->ObterExerciciosAerobicos($idTreinoAtual, $trnHoje['FSE_ID'], $TipoExId);
                            $auxCount = 0;
                            foreach ($resultado as $value3) 
                            {
                                $auxCount ++;
                                if (!in_array($value3['EXETRN_EXE_ID'], $trnHojeEx)) {
                                    
                                    $planejamentoViewModel->ExercicoTreinoAerobico = new \stdClass();
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Rounds = $value3['EXETRN_ROUNDS'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Estimulos = $value3['EXETRN_ESTIMULO'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Intensidade = $value3['EXETRN_INTENSIDADE'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Pausa = $value3['EXETRN_PAUSA'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Tipo = $value3['EXETRN_TIPO'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->TotalTempo = $value3['EXETRN_TOTAL'];
                                    $planejamentoViewModel->ExercicoTreinoAerobico->Titulo = $value3['EXE_TITULO'];
                                }
                                $trnHojeEx[$value3['EXETRN_EXE_ID']] = $value3['EXETRN_EXE_ID'];
                            }
                        }
                    }
                }
            }
            if(strtotime($datapesq->format('Y-m-d')) < strtotime($dataHoje->format('Y-m-d')))
            {
                $planejamentoViewModel->TreinoAtrasado = new PlanejamentoTreinoAtrasadoViewModel();
                
                $planejamentoViewModel->TreinoAtrasado->IdTreino = $idTreinoAtual;
                $planejamentoViewModel->TreinoAtrasado->Titulo = $trnHoje['TipoExe'];
                $planejamentoViewModel->TreinoAtrasado->Data = $datapesq;

                if(strcmp($planejamentoViewModel->TreinoAtrasado->Titulo, "OFF") == 0)
                    $planejamentoViewModel->ExisteTreinoHoje = false;
            }
            else {
                $planejamentoViewModel->TreinoDia = new PlanejamentoTreinoDiaViewModel();

                $planejamentoViewModel->TreinoDia->IdTreino = $idTreinoAtual;
                $planejamentoViewModel->TreinoDia->Titulo = $trnHoje['TipoExe'];
                $planejamentoViewModel->TreinoDia->Data = $datapesq;

                if(strcmp($planejamentoViewModel->TreinoDia->Titulo, "OFF") == 0)
                    $planejamentoViewModel->ExisteTreinoHoje = false;
                else
                {
                    $planejamentoViewModel->TreinoDia->Serie = $trnHoje['FSE_NUMSERIE'];
                    $planejamentoViewModel->TreinoDia->Repeticoes = $trnHoje['FSE_REP'];
                    $planejamentoViewModel->TreinoDia->Execucao = $trnHoje['FSE_VLE'];
                    $planejamentoViewModel->TreinoDia->IntervaloSeries = $trnHoje['FSE_INTERVALOSERIE'];
                    $planejamentoViewModel->TreinoDia->IntervaloExercicios = $trnHoje['FSE_INTERVALOEX'];
                    $planejamentoViewModel->TreinoDia->Percepcao = $trnHoje['FSE_ESFORCO'];
                }
            }

            return $planejamentoViewModel;
        }
    }

    public function SalvarStatusTreino($trn_concluido) 
    {
        $this->repositorioDeTreinoConcluido->SalvarStatusTreino($trn_concluido);
    }

    public function ObterTreino($idTreino, $dataTreino) 
    {
        $planejamentoViewModel = new PlanejamentoViewModel();

        $dataTreino = str_replace('-', '/', $dataTreino);
        $datapesq = new \DateTime($dataTreino);
        $idTreinoAtual = $idTreino;

        if ($idTreinoAtual != 0)
        {   
            //Busca o treino do dia da semana atual
            $diaSemana = $datapesq->format("w") + 1;
            
            $repo01 = $this->repositorioDeDiasTreino->ObterTreinoDaSemanaDoTreinoAtual($diaSemana, $idTreinoAtual);       
            $trnHoje['TipoExe'] = "OFF";
            foreach ($repo01 as $value)
            {
                $trnHoje['TipoExe'] = $value['TPE_TITULO'];
                $trnHoje['TipoExeID'] = $value['TPE_ID'];
                $trnHoje['TipoFlgAero'] = $value['TPE_FLEAEROBIO'];
                $trnHoje['IdDiaTreino'] = $value['DST_ID'];
            }
        
            if ($trnHoje['TipoExe'] != "OFF")
            {
                //busca a fase atual
                $repo02 = $this->repositorioDeFases->ObterFaseAtual($idTreinoAtual, $datapesq->format("Y-m-d"));        
                foreach ($repo02 as $value)
                {
                    $trnHoje['Metodo'] = $value['MET_TITULO'];
                    $trnHoje['IDMetodo'] = $value['MET_ID'];
                    $trnHoje['FSE_INTERVALOEX'] = $value['FSE_INTERVALOEX'];
                    $trnHoje['FSE_INTERVALOSERIE'] = $value['FSE_INTERVALOSERIE'];
                    $trnHoje['FSE_ESFORCO'] = $value['FSE_ESFORCO'];
                    $trnHoje['FSE_VLE'] = $value['VLE_TITULO'];
                    $trnHoje['FSE_REP'] = $value['REP_TITULO'];
                    $trnHoje['FSE_NUMSERIE'] = $value['FSE_NUMSERIE'];
                    $trnHoje['FSE_ID'] = $value['FSE_ID'];
                }
                $trnHoje['EXERCICIOS_LISTA'] = [];
                
                //Busca Quantidade de Exercicios
                $repo03 = $this->repositorioDeExerciciosTreino->ObterExerciciosQuantidade($idTreinoAtual, $trnHoje['TipoExeID'], $trnHoje['FSE_ID']);
                $TotalExercicios = $repo03->field_count;
                //Busca Exercicios de Aeróbio

                $repo04 = $this->repositorioDeExerciciosTreino->ObterExerciciosAerobicoQuantidade($idTreinoAtual, $trnHoje['TipoExeID']);
                $TotalExerciciosAerobio = $repo04->field_count;
                $vayAerobios = array();
                foreach($repo04 as $valaerobios) { $vayAerobios[$valaerobios['EXETRN_EXE_ID']] = $valaerobios['EXETRN_EXE_ID']; }

                $TotalExercicios -= $TotalExerciciosAerobio;
                if ($TotalExercicios > 0)
                {
                    $repo05 = $this->repositorioDeExercicios->ObterExercicios($idTreinoAtual, $trnHoje['TipoExeID']);
                    foreach ($repo05 as $value)
                    {
                        if (!in_array($value['EXETRN_EXE_ID'], $vayAerobios)) {
                            $exercicio = new \stdClass();

                            if ($value['EXE_LINK'] != "") { $exercicio->EXE_LINK = $value['EXE_LINK']; }

                            $exercicio->EXE_TITULO = $value['EXE_TITULO'];
                            $exercicio->EXE_ID = $value['EXE_ID'];                    
                            array_push($trnHoje['EXERCICIOS_LISTA'], $exercicio);
                        }
                    }
                }
                if ($TotalExerciciosAerobio > 0)
                {
                    $trnHojeEx[] = array();
                    //Verificando qual aerobio é:
                    $repo06 = $this->repositorioDeDiasTreino->ObterTreinoDaSemana($idTreinoAtual);
                    foreach ($repo06 as $value01)
                    {
                        if ($value01['DST_DIA'] == $diaSemana)
                        {
                            if(isset($trnHoje['FSE_ID']))
                            {
                                $repo07 = $this->repositorioDeExerciciosTreino->ObterExerciciosAerobicos($idTreinoAtual, $trnHoje['FSE_ID'], $value01['TPE_ID']);
                                foreach ($repo07 as $value3) 
                                {
                                    if (!in_array($value3['EXETRN_EXE_ID'], $trnHojeEx)) 
                                    {
                                        $exercicio = new \stdClass();

                                        $exercicio->EXETRN_ROUNDS = $value3['EXETRN_ROUNDS'];
                                        $exercicio->EXETRN_ESTIMULO = $value3['EXETRN_ESTIMULO'];
                                        $exercicio->EXETRN_INTENSIDADE = $value3['EXETRN_INTENSIDADE'];
                                        $exercicio->EXETRN_PAUSA = $value3['EXETRN_PAUSA'];
                                        $exercicio->EXETRN_TIPO = $value3['EXETRN_TIPO'];
                                        $exercicio->EXETRN_TOTAL = $value3['EXETRN_TOTAL'];
                                        $exercicio->EXE_TITULO = $value3['EXE_TITULO'];


                                        array_push($trnHoje['EXERCICIOS_LISTA'], $exercicio);
                                    }
                                    $trnHojeEx[$value3['EXETRN_EXE_ID']] = $value3['EXETRN_EXE_ID'];
                                }
                            }
                        }
                    }
                }
            }

            return $trnHoje;
        }
    }
}