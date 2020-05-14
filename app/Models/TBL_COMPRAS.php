<?php namespace App\Models;

class TBL_COMPRAS extends PadraoModel
{
    protected $table = 'TBL_COMPRAS';
    protected $primaryKey = 'CMP_ID';
    protected $allowedFields;
    protected $validationRules;

    public function Obter($id)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_COMPRAS 
                                         WHERE CMP_ID = {$id}");
    }

    public function ObterComprasAluno($idAluno)
    {
        return  $this->db
                     ->simpleQuery("    SELECT * 
                                          FROM TBL_COMPRAS 
                                    INNER JOIN TBL_PLANO ON CMP_PLN_ID = PLN_ID
                                         WHERE CMP_ALN_ID = {$idAluno}
                                      ORDER BY CMP_DATACOMPRA DESC");
    }

    public function Inserir($compra)
    {
        $this->db
                     ->query("    INSERT 
                                    INTO TBL_COMPRAS(CMP_ALN_ID, CMP_PLN_ID, CMP_STATUSPAG, CMP_VALOR, CMP_DATACOMPRA, CMP_PARCELAS, CMP_AUTENTICADOR, CMP_TIPO, CMP_DATAPAG, CMP_STATUS, CMP_VALORPAGO, CMP_VALORRECEB, CMP_CPN_CODIGO) 
                                  VALUES (
                                            {$compra['CMP_ALN_ID']},
                                            {$compra['CMP_PLN_ID']},
                                            {$compra['CMP_STATUSPAG']},
                                            {$compra['CMP_VALOR']},
                                            NULL,
                                            {$compra['CMP_PARCELAS']},
                                            {$compra['CMP_AUTENTICADOR']},
                                            {$compra['CMP_TIPO']},
                                            {$compra['CMP_DATAPAG']},
                                            {$compra['CMP_STATUS']},
                                            NULL,
                                            NULL,
                                            {$compra['CMP_CPN_CODIGO']})");
            
        return $db->insertID();
    }
}