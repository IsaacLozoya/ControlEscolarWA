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
    'telefono', 'curp', 'afiliacion_imss', 'rol_id', 'password_hash', 'password_salt','unidad_academica_id',
    'carrera_id','plan_estudio_id','grupo_id','semestre_id','vigencia'];

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
        'rol' => 'App\Models\ModeloRol','foreignKey' => 'rol_id',
        'unidad_academica' => 'App\Models\ModeloUnidadAcademica','foreignKey' => 'unidad_academica_id',
        'carrera' => 'App\Models\ModeloCarrera','foreignKey' => 'carrera_id',
        'plan_estudio' => 'App\Models\ModeloPlanEstudio','foreignKey' => 'plan_estudio_id',
        'grupo' => 'App\Models\ModeloGrupo','foreignKey' => 'grupo_id',
        'semestre' => 'App\Models\ModeloSemestre','foreignKey' => 'semestre_id',
        'curriculo' => 'App\Models\ModeloCurriculo','foreignKey' => 'no_cuenta',
        'profesor_materia' => 'App\Models\ModeloProfesorMateria','foreignKey' => 'profesor_id',
    ];

   public function obtenerGruposAsignados($no_cuenta)
{
    // Este query obtiene los grupos asignados al profesor con el número de cuenta proporcionado.
    $query = $this->db->query("SELECT DISTINCT grupo_id FROM profesor_materia WHERE profesor_id = ?", [$no_cuenta]);

    // Retorna los resultados como un array de objetos
    return $query->getResult();
}

public function obtenerInformacionProfesor($no_cuenta)
{
    $query = $this->db->query("
        SELECT
            pm.profesor_id,
            u.nombre AS profesor_nombre,
            m.nombre AS materia,
            sm.semestre_id,
            g.nombre AS grupo
        FROM
            profesor_materia pm
        JOIN
            usuario u ON pm.profesor_id = u.no_cuenta
        JOIN
            semestre_materia sm ON pm.semestre_materia_id = sm.id
        JOIN
            materia m ON sm.materia_id = m.id
        JOIN
            grupo g ON pm.grupo_id = g.id
        WHERE
            pm.profesor_id = ?", [$no_cuenta]);
    

    return $query->getResult();
}

// En tu modelo ModeloLogin
public function updateVigencia($id, $estado){
    $data = ['vigencia' => $estado];
    // Utilizar set() y where() para la actualización
    $this->db->table('usuario')->set($data)->where('no_cuenta', $id)->update();
}


}