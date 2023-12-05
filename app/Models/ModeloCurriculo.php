<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloCurriculo extends Model
{
    protected $table = 'calificacion';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_cuenta',
        'materia_id',
        'calificacion',
        'semestre_materia_id',
    ];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $skipValidation = false;

    protected $validationRules = [];

    protected $validationMessages = [];


    // Definir relaciones
    protected $has_one = [
        'semestre_materia' => 'App\Models\SemestreMateria','foreignKey' => 'semestre_materia_id',
        'materia' => 'App\Models\ModeloMateria','foreignKey' => 'materia_id',
        'usuario' => 'App\Models\ModeloLogin','foreignKey' => 'no_cuenta',
    ];

    public function obtenerCalificaciones($no_cuenta)
    {
        // Este query obtiene las calificaciones del alumno con el número de cuenta proporcionado.
        $query = $this->db->query("SELECT calificacion.id, materia.nombre AS materia, semestre.nombre AS semestre, calificacion.calificacion FROM calificacion INNER JOIN semestre_materia ON calificacion.semestre_materia_id = semestre_materia.id INNER JOIN materia ON semestre_materia.materia_id = materia.id INNER JOIN semestre ON semestre_materia.semestre_id = semestre.id WHERE calificacion.no_cuenta = ? ORDER BY semestre_materia.semestre_id ASC", [$no_cuenta]);

        return $query->getResultArray();
    }



}


