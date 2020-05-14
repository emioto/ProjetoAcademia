<?php namespace App\Models;

class TBL_FASES extends PadraoModel
{
    protected $table = 'TBL_FASES';
    protected $primaryKey = 'FSE_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterFasesTreino($idTreinoAtual, $diasPeriodo)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                    FROM TBL_FASES 
                              INNER JOIN TBL_METODO ON MET_ID = FSE_MET_ID
                                   WHERE FSE_TRN_ID = {$idTreinoAtual} 
                                     AND FSE_DATAINI <= '{$diasPeriodo}' 
                                     AND FSE_DATAFIM >= '{$diasPeriodo}'");
    }

    public function ObterFaseAtual($idTreinoAtual, $datapesq)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_FASES
                                    INNER JOIN TBL_METODO ON MET_ID = FSE_MET_ID 
                                    INNER JOIN TBL_REPETICOES ON REP_ID = FSE_REP_ID 
                                    INNER JOIN TBL_VELOCIDADEEXEC ON VLE_ID = FSE_VLE_ID
                                         WHERE FSE_DATAFIM >= '{$datapesq}' 
                                           AND FSE_DATAINI <= '{$datapesq}' 
                                           AND FSE_TRN_ID = $idTreinoAtual");
    }
}