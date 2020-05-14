<?php namespace App\Models;

class TBL_USUARIOS extends PadraoModel
{
    protected $table = 'TBL_USUARIOS';
    protected $primaryKey = 'USR_EMAIL';
    protected $allowedFields;
    protected $validationRules;
}