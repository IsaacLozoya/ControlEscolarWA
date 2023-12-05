<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloMateria extends Model
{
    protected $table = 'materia';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];

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
    protected $hasMany = [
        'calificaciones' => [
            'App\Models\ModeloCalificacion',
            'foreignKey' => 'materia_id',
        ],
    ];

    protected $has_one = [
        'semestre_materia' => [
            'App\Models\ModeloSemestreMateria',
            'foreignKey' => 'materia_id',
        ],
    ];

    protected $has_many = [
        'profesor_materia' => [
            'App\Models\ModeloProfesorMateria',
            'foreignKey' => 'materia_id',
        ],
    ];

    protected $belongs_to = [
        'semestre_materia' => [
            'App\Models\ModeloSemestreMateria',
            'foreignKey' => 'semestre_materia_id',
        ],
    ];

    protected $belongsToMany = [
        'profesores' => [
            'App\Models\ModeloLogin',
            'through' => 'profesor_materia',
            'pivotTable' => 'profesor_materia',
            'foreignKey' => 'materia_id',
            'relatedKey' => 'profesor_id',
        ],
    ];
}
