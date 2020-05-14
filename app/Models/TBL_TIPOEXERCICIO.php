<?php namespace App\Models;

class TBL_TIPOEXERCICIO extends PadraoModel
{
    protected $table = 'TBL_TIPOEXERCICIO';
    protected $primaryKey = 'TPE_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterTipoExercicio($idTreinoAtual)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_DIASTREINO 
                                    INNER JOIN TBL_TIPOEXERCICIO ON TPE_ID = DST_TPE_ID
                                         WHERE DST_TRN_ID = {$idTreinoAtual}");
    }
}