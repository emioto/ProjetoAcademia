<?php namespace App\Models;

class TBL_TREINOS extends PadraoModel
{
    protected $table = 'TBL_TREINOS';
    protected $primaryKey = 'TRN_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterTreinosAluno($idAluno, $datapesq)
    {
        return $this->db
                     ->simpleQuery("    SELECT * 
                                    FROM TBL_TREINOS 
                              INNER JOIN TBL_COMPRAS ON CMP_ID = TRN_CMP_ID
                                   WHERE CMP_ALN_ID = {$idAluno}
                                     AND (TRN_DATAFIM >= '{$datapesq}' OR TRN_DATAINI >= '{$datapesq}') 
                                     AND TRN_STATUS = 1 
                                ORDER BY TRN_ID");
    }

    public function ObterTreinosPlanejamento($idAluno, $datapesq)
    {
        return $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_TREINOS 
                                    INNER JOIN TBL_COMPRAS ON CMP_ID = TRN_CMP_ID
                                         WHERE CMP_ALN_ID = {$idAluno} 
                                           AND TRN_DATAFIM >= '{$datapesq} 00:00:00' 
                                           AND  TRN_DATAINI <= '{$datapesq} 23:59:59'
                                           AND TRN_STATUS = 1 
                                           AND CMP_STATUSPAG IN (3,4) 
                                      ORDER BY TRN_ID DESC");
    }
}