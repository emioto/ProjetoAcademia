<?php namespace App\Models;

class TBL_DIASTREINO extends PadraoModel
{
    protected $table = 'TBL_DIASTREINO';
    protected $primaryKey = 'DST_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterTreinoDaSemana($idTreino)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                    FROM TBL_DIASTREINO 
                              INNER JOIN TBL_TIPOEXERCICIO ON TPE_ID = DST_TPE_ID
                                   WHERE DST_TRN_ID = {$idTreino}");
    }

    public function ObterTreinoDaSemanaDoTreinoAtual($diaSemana, $idTreinoAtual)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_DIASTREINO 
                                    INNER JOIN TBL_TIPOEXERCICIO ON TPE_ID = DST_TPE_ID
                                         WHERE DST_DIA = {$diaSemana}
                                           AND DST_TRN_ID = {$idTreinoAtual}");
    }
}