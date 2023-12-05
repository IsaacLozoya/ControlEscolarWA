<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloProfesorMateria extends Model
{
    protected $table            = 'profesor_materia';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'profesor_id', 'grupo_id', 'semestre_materia_id'];

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

    // Definir relaciones

    protected $has_one = [
        'profesor' => 'App\Models\ModeloLogin','foreignKey' => 'no_cuenta',
        'grupo' => 'App\Models\Modelologin','foreignKey' => 'grupo_id',
        'semestre_materia' => 'App\Models\ModeloSemestreMAteria','foreignKey' => 'semestre_materia_id',
    ];
}
