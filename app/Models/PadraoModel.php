<?php namespace App\Models;

use CodeIgniter\Model;

abstract class PadraoModel extends Model
{
    protected $table;
    protected $primaryKey;
    protected $allowedFields;
    protected $validationRules;

    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $validationMessages = [];
    protected $skipValidation = false;
}