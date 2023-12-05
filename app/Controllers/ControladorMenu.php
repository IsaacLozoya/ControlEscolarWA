<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ControladorMenu extends BaseController
{

    protected $modeloLogin;
    protected $modeloMateria;
    protected $modeloSemestreMAteria;
    protected $modeloCurriculo;
    protected $modeloProfesorMateria;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->modeloLogin = model('ModeloLogin');
        $this->modeloMateria = model('ModeloMateria');
        $this->modeloSemestreMateria = model('ModeloSemestreMAteria');
        $this->modeloCurriculo = model('ModeloCurriculo');
        $this->modeloProfesorMateria = model('ModeloProfesorMateria');

    }

    public function menu()
    {
        if ($user = $this->session->get('user')) {
            return view('menus/menuprincipal');
        }else {
            return redirect()->to('login');
        }
    }

    public function kardex()
    {
        if ($user = $this->session->get('user')) {
            $user = $this->modeloLogin->where('no_cuenta', $user['no_cuenta'])->first();
            if ($user['rol_id'] == 1) {
               return view('menus/boletas/kardex', ['user' => $user]);
            } elseif ($user['rol_id'] == 2) {
                // Consulta para obtener los grupos asignados al profesor
                $informacionProfesor = $this->modeloLogin->obtenerInformacionProfesor($user['no_cuenta']);
    
                return view('menus/boletas/kardex', ['user' => $user, 'informacionProfesor' => $informacionProfesor]);
            } else {
                // Lógica para otros roles
                $informacionProfesor = $this->modeloLogin->obtenerInformacionProfesor($user['no_cuenta']);
    
                return view('menus/boletas/kardex', ['user' => $user, 'informacionProfesor' => $informacionProfesor]);
            }
        } else {
            return redirect()->to('login');
        }
    }





    public function vistakardex()
    {
    
        if ($user = $this->session->get('user')) {
             // Obtener el número de cuenta del usuario
        $no_cuenta = $this->session->get('user')['no_cuenta'];
        // Script SQL
        $sql = "SELECT
                    m.nombre AS materia,
                    c.calificacion,
                    s.numero AS semestre
                FROM
                    semestre_materia sm
                JOIN
                    materia m ON sm.materia_id = m.id
                JOIN
                    semestre s ON sm.semestre_id = s.id
                JOIN
                    usuario u ON u.no_cuenta = $no_cuenta
                LEFT JOIN
                    calificacion c ON c.semestre_materia_id = sm.id AND c.no_cuenta = u.no_cuenta
                WHERE
                    s.numero <= (SELECT MAX(numero) FROM semestre WHERE id IN (SELECT DISTINCT semestre_id FROM semestre_materia))
                    AND c.calificacion IS NOT NULL";
    
        // Ejecutar la consulta
        $query = $this->modeloLogin->query($sql);
        $curriculo = $query->getResultArray();
    
        if ($user = $this->session->get('user')) {
            $user = $this->modeloLogin->where('no_cuenta', $user['no_cuenta'])->first();
            return view('menus/boletas/visualkardex', ['user' => $user, 'curriculo' => $curriculo]);
        } else {
            return redirect()->to('boletas/kardex');
        }
        }else {
            return redirect()->to('login');
        }

    }

    public function editKardex($id = null){

        if ($user = $this->session->get('user')) {
            $no_cuenta = $this->session->get('user')['no_cuenta'];
            
            $sql = "select distinct 
                u.no_cuenta,
                u.nombre AS alumno_nombre,
                m.nombre AS materia,
                sm.semestre_id,
                u.grupo_id  AS grupo,
                    c.calificacion
                FROM
                    profesor_materia pm
                JOIN
                    semestre_materia sm ON pm.semestre_materia_id = sm.id
                JOIN
                    materia m ON sm.materia_id = m.id
                JOIN
                    grupo g ON pm.grupo_id = g.id
                JOIN
                    calificacion c ON sm.id = c.semestre_materia_id
                JOIN
                    usuario u ON c.no_cuenta = u.no_cuenta 
                WHERE
                    pm.profesor_id = $no_cuenta and u.grupo_id  = $id and m.id = '34'";
            
            $query = $this->modeloLogin->query($sql);
            $alumno = $query->getResultArray();
            $user = $this->modeloLogin->where('no_cuenta', $user['no_cuenta'])->first();

            if($user){
            return view('/menus/boletas/editkardex', ['alumno' => $alumno , 'usuario' => $user]);
            }else{
                session()->setFlashdata('failed','El usuario no se encontró');
                return redirect()->to('/boletas/kardex');
    
            }
        }else {
            return redirect()->to('login');
        }
    }

    public function solicitudjustificante () {
        if ($user = $this->session->get('user')) {
            return view('menus/justificantes');
        } else {
            return redirect()->to('login');
        }
    }

}
