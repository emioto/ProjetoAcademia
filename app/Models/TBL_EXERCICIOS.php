<?php namespace App\Models;

class TBL_EXERCICIOS extends PadraoModel
{
    protected $table = 'TBL_EXERCICIOS';
    protected $primaryKey = 'EXE_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterExercicios($idTreinoAtual, $tipoExeID)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_EXERCICIOS_TRN 
                                    INNER JOIN TBL_EXERCICIOS ON EXE_ID = EXETRN_EXE_ID
                                         WHERE EXETRN_TRN_ID = {$idTreinoAtual}
                                           AND EXETRN_TPE_ID = {$tipoExeID} 
                                      ORDER BY EXETRN_ORDEM");
    }
}