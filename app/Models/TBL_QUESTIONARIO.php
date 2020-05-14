<?php namespace App\Models;

class TBL_QUESTIONARIO extends PadraoModel
{
    protected $table = 'TBL_QUESTIONARIO';
    protected $primaryKey = 'QST_ID';
    protected $allowedFields;
    protected $validationRules;

    public function ObterQuestionarioAluno($idAluno, $datapesq)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_QUESTIONARIO 
                                    INNER JOIN TBL_COMPRAS ON CMP_ID = QST_CMP_ID 
                                    INNER JOIN TBL_PLANO ON PLN_ID = CMP_PLN_ID 
                                    INNER JOIN TBL_TREINOS ON TRN_ID = QST_TRN_ID
                                         WHERE CMP_ALN_ID = {$idAluno} 
                                           AND QST_STATUS = 0 
                                           AND TRN_STATUS = 0 
                                           AND QST_TIPO = 1 
                                           AND TRN_DTPREVISTA <= '{$datapesq} 23:59:59'");
    }
}