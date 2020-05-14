<?php namespace App\Models;

class TBL_CUPONS extends PadraoModel
{
    protected $table = 'TBL_CUPONS';
    protected $primaryKey = 'CPN_CODIGO';
    protected $allowedFields;
    protected $validationRules;

    public function Obter($codigo)
    {
        return $this->db
                    ->query("    SELECT * 
                                   FROM TBL_CUPONS
                                  WHERE UPPER(CPN_CODIGO) LIKE UPPER('{$codigo}') 
                                    AND CPN_STATUS = 1");
    }
}