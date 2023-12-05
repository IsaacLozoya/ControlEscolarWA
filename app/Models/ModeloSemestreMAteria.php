<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloSemestreMAteria extends Model
{
    protected $table = 'semestre_materia';
    protected $primaryKey = 'id';
    protected $allowedFields = ['semestre_id', 'materia_id'];

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
    protected $belongsTo = [
        'semestre' => [
            'App\Models\ModeloSemestre',
            'foreignKey' => 'semestre_id',
        ],
        'materia' => [
            'App\Models\ModeloMateria',
            'foreignKey' => 'materia_id',
        ],
    ];
}
