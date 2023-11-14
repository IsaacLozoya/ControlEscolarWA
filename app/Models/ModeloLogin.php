<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloLogin extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'no_cuenta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'sexo', 'fecha_nacimiento', 'fecha_ingreso',
    'calle', 'colonia', 'codigo_postal', 'poblacion', 'localidad',
    'telefono', 'curp', 'afiliacion_imss', 'rol_id', 'password_hash', 'password_salt'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
