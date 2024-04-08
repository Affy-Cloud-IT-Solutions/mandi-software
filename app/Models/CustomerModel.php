<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // protected $allowedFields    = ['customerName', 'phone', 'date',  'company_id', 'company_idd'];
<<<<<<< HEAD
    protected $allowedFields    = ['customerName','phone','company_idd', 'date','company_id','is_delete'];
=======
    protected $allowedFields    = ['customerName','phone','company_idd', 'date','company_id'];
>>>>>>> 8e6f9fa91736f6d825240cfc3bd3029148e4ad82


    protected bool $allowEmptyInserts = false;

    // Dates

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}