<?php namespace App\Models;

class TBL_CONCLUIDOS extends PadraoModel
{
    protected $table = 'TBL_CONCLUIDOS';
    protected $primaryKey = 'CNC_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterTreinoConcluido($idTreinoAtual, $diasPeriodo)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                    FROM TBL_CONCLUIDOS
                                   WHERE CNC_TRN_ID = {$idTreinoAtual} 
                                     AND CNC_DATA = '{$diasPeriodo}'");
    }

    public function ObterUltimoTreinoAluno($idTreinoAtual)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_CONCLUIDOS
                                          WHERE CNC_TRN_ID = {$idTreinoAtual}
                                       ORDER BY CNC_DATA");
    }

    public function SalvarStatusTreino($trn_concluido)
    {
        return  $this->db
                     ->simpleQuery("    INSERT 
                                          INTO TBL_CONCLUIDOS(CNC_TRN_ID, CNC_DATA, CNC_STATUS)
                                        VALUES ({$trn_concluido['CNC_TRN_ID']},
                                                '{$trn_concluido['CNC_DATA']}',
                                                {$trn_concluido['CNC_STATUS']})");
    }
}