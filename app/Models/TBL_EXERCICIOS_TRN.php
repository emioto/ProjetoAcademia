<?php namespace App\Models;

class TBL_EXERCICIOS_TRN extends PadraoModel
{
    protected $table = 'TBL_EXERCICIOS_TRN';
    protected $primaryKey = 'EXETRN_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterExerciciosTreinoDaSemana($idTreinoAtual, $diaSemanaTreino)
    {
        return  $this->db
                     ->simpleQuery("    SELECT DISTINCT EXE_ID, EXE_TITULO, EXE_LINK 
                                             FROM TBL_EXERCICIOS_TRN 
                                       INNER JOIN TBL_EXERCICIOS ON EXE_ID = EXETRN_EXE_ID 
                                            WHERE EXETRN_TRN_ID = {$idTreinoAtual} 
                                              AND EXETRN_TPE_ID = {$diaSemanaTreino}
                                         ORDER BY EXETRN_ORDEM");
    }

    public function ObterExerciciosQuantidade($idTreinoAtual, $tipoExeID, $fSE_ID)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_EXERCICIOS_TRN
                                         WHERE EXETRN_TRN_ID = {$idTreinoAtual} 
                                           AND EXETRN_TPE_ID = {$tipoExeID} 
                                           AND (EXETRN_FSE_ID = {$fSE_ID} OR EXETRN_FSE_ID = 0)");
    }

    public function ObterExerciciosAerobicoQuantidade($idTreinoAtual, $tipoExeID)
    {
        return  $this->db
                     ->simpleQuery("    SELECT DISTINCT EXETRN_EXE_ID
                                                   FROM TBL_EXERCICIOS_TRN 
                                             INNER JOIN TBL_EXE_TPE ON TPEEXE_EXE_ID = EXETRN_EXE_ID 
                                             INNER JOIN TBL_TIPOEXERCICIO ON TPE_ID = TPEEXE_TPE_ID 
                                                  WHERE EXETRN_TRN_ID = {$idTreinoAtual}
                                                    AND TPE_FLEAEROBIO = 1 
                                                    AND EXETRN_TPE_ID = {$tipoExeID} 
                                               ORDER BY EXETRN_ORDEM");
    }

    public function ObterExerciciosAerobicos($idTreinoAtual, $FSE_ID, $TipoExId) 
    {
        return  $this->db
                     ->simpleQuery("    SELECT *
                                          FROM TBL_EXERCICIOS_TRN 
                                    INNER JOIN TBL_EXERCICIOS ON EXE_ID = EXETRN_EXE_ID
                                         WHERE EXETRN_TRN_ID = {$idTreinoAtual}
                                           AND EXETRN_FSE_ID = {$FSE_ID}
                                           AND EXETRN_TPE_ID = {$TipoExId} 
                                      ORDER BY EXETRN_ID");
    }
}