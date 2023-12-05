<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ControladorAdmin extends BaseController
{

    protected $modeloLogin;
    
    public function __construct(){
        helper(['form','url','session']);
        $this->session = \Config\Services::session();
        $this->modeloLogin = model('ModeloLogin');
    }


public function admin()
{
    if ($user = $this->session->get('user')) {
        // Obtener solo usuarios con vigencia A
        $activeUsers = $this->modeloLogin->where('rol_id !=', 0)
                                         ->where('vigencia', 'A')
                                         ->orderBy('no_cuenta', 'asc')
                                         ->findAll();

        // Obtener solo usuarios con vigencia I (inactivos)
        $inactiveUsers = $this->modeloLogin->where('rol_id !=', 0)
                                           ->where('vigencia', 'I')
                                           ->orderBy('no_cuenta', 'asc')
                                           ->findAll();

        return view('menus/admin', compact('activeUsers', 'inactiveUsers'));
    } else {
        return redirect()->to('login');
    }
}


    

    public function showuser($id = null){


        if ($user = $this->session->get('user')) {
            $usuario = $this->modeloLogin->find($id);
            if($usuario){
                return view('admin/showuser',compact('usuario'));
            }else{
                return redirect()->to(site_url('/admin'));
            }
        }else {
            return redirect()->to('login');
        }


    }

    public function edituseralumno($id = null){

        if ($user = $this->session->get('user')) {
            $usuario = $this->modeloLogin->find($id);
            if($usuario){
            return view('admin/edituseralumno',compact('usuario'));
            }else{
                session()->setFlashdata('failed','El usuario no se encontró');
                return redirect()->to('/admin');
    
            }
        }else {
            return redirect()->to('login');
        }
    }

    public function edituserprofesor($id = null){

        if ($user = $this->session->get('user')) {
            $usuario = $this->modeloLogin->find($id);
            if($usuario){
            return view('admin/edituserprofesor',compact('usuario'));
            }else{
                session()->setFlashdata('failed','El usuario no se encontró');
                return redirect()->to('/admin');
    
            }
        }else {
            return redirect()->to('login');
        }
    }

    
    public function update($id = null){
        if ($user = $this->session->get('user')) {
            $this->modeloLogin->save([
                'no_cuenta' => $id,
                'nombre'=> $this->request->getVar('nombre'),
                'sexo'=> $this->request->getVar('sexo'),
                'fecha_nacimiento'=> $this->request->getVar('fecha_nacimiento'),
                'fecha_ingreso'=> $this->request->getVar('fecha_ingreso'),
                'calle'=> $this->request->getVar('calle'),
                'colonia'=> $this->request->getVar('colonia'),
                'codigo_postal'=> $this->request->getVar('codigo_postal'),
                'poblacion'=> $this->request->getVar('poblacion'),
                'localidad'=> $this->request->getVar('localidad'),
                'telefono'=> $this->request->getVar('telefono'),
                'curp'=> $this->request->getVar('curp'),
                'afiliacion_imss'=> $this->request->getVar('afiliacion_imss'),
                'rol_id'=> $this->request->getVar('rol_id'),
                'unidad_academica_id'=> $this->request->getVar('unidad_academica_id'),
                'carrera_id'=> $this->request->getVar('carrera_id'),
                'plan_estudio_id'=> $this->request->getVar('plan_estudio_id'),
                'grupo_id'=> $this->request->getVar('grupo_id'),
                'semestre_id'=> $this->request->getVar('semestre_id'),
                'vigencia'=> $this->request->getVar('vigencia'),

            ]);
    
            session()->setFlashdata('success','Se actualizó el usuario correctamente');
            return redirect()->to(site_url('/admin'));
        }else {
            return redirect()->to('login');
        }

    }

    public function delete($id = null){
        if ($user = $this->session->get('user')) {
            // Actualizar la columna vigencia a 'I' (Inactivo) en lugar de eliminar
            $this->modeloLogin->updateVigencia($id, 'I');
    
            session()->setFlashdata('success', 'Usuario Inactivado');
            return redirect()->to(base_url('/admin'));
        } else {
            return redirect()->to('login');
        }
    }
    

    public function createuser(){

        if ($user = $this->session->get('user')) {
            return view('admin/createuser');
        }else {
            return redirect()->to('login');
        }


    }

    public function newuser(){

        if ($user = $this->session->get('user')) {
            $no_cuenta = $this->request->getVar('no_cuenta');
            $nombre = $this->request->getVar('nombre');
            $sexo = $this->request->getVar('sexo');
            $fecha_nacimiento = $this->request->getVar('fecha_nacimiento');
            $fecha_ingreso = $this->request->getVar('fecha_ingreso');
            $calle = $this->request->getVar('calle');
            $colonia = $this->request->getVar('colonia');
            $codigo_postal = $this->request->getVar('codigo_postal');
            $poblacion = $this->request->getVar('poblacion');
            $localidad = $this->request->getVar('localidad');
            $telefono = $this->request->getVar('telefono');
            $curp = $this->request->getVar('curp');
            $afiliacion_imss = $this->request->getVar('afiliacion_imss');
            $rol_id = $this->request->getVar('rol_id');
            $password = $this->request->getVar('password');
        
            // Validar y sanitizar los datos según sea necesario
            if ($sexo !== 'M' && $sexo !== 'F' && $sexo !== 'N'){
                // Manejar el error o redirigir con un mensaje de error
                session()->setFlashdata('error', 'El campo Sexo es inválido');
                return redirect()->to(site_url('/admin/createuser'));
            }
            // Construir la consulta SQL
            $sql = "INSERT INTO public.usuario (
                        no_cuenta, nombre, sexo, fecha_nacimiento, fecha_ingreso,
                        calle, colonia, codigo_postal, poblacion, localidad,
                        telefono, curp, afiliacion_imss, rol_id, password_hash, password_salt
                    ) VALUES (
                        $no_cuenta,
                        '$nombre',
                        '$sexo',
                        '$fecha_nacimiento',
                        '$fecha_ingreso',
                        '$calle',
                        '$colonia',
                        '$codigo_postal',
                        '$poblacion',
                        '$localidad',
                        '$telefono',
                        '$curp',
                        '$afiliacion_imss',
                        $rol_id,
                        crypt('$password', gen_salt('bf')),
                        gen_salt('bf')
                    )";
        
            // Ejecutar la consulta
            $this->modeloLogin->query($sql);
        
            session()->setFlashdata('success', 'Se agregó un nuevo usuario');
            return redirect()->to(site_url('/admin'));
        }else {
            return redirect()->to('login');
        }
       
    }
    
    
}
