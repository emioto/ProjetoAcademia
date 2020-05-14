<?php namespace App\Models;

class TBL_CUPONS_USUARIOS extends PadraoModel
{
    protected $table = 'TBL_CUPONS_USUARIOS';
    protected $primaryKey = 'CPNUSR_CPN_CODIGO';
    protected $allowedFields;
    protected $validationRules;
}