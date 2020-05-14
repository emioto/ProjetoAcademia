<?php namespace App\Models;

class TBL_PLANO extends PadraoModel
{
    protected $table = 'TBL_PLANO';
    protected $primaryKey = 'PLN_ID';
    protected $allowedFields;
    protected $validationRules;

    public function Obter($id)
    {
        return $this->db
                     ->query("    SELECT * 
                                    FROM TBL_PLANO
                                   WHERE PLN_ID = {$id}");
    }

    public function ObterPorData($data)
    {
        return $this->db
                     ->query("    SELECT * 
                                    FROM TBL_PLANO
                                   WHERE PLN_DATAINICIO <= '{$data}' 
                                     AND PLN_DATAFINAL >= '{$data}'
                                     AND PLN_TIPO = 1");
    }
}