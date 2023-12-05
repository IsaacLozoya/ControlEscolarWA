<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class ControladorLogin extends BaseController
{
    protected $modeloLogin;
    

    public function __construct(){
        helper(['form','url','session']);
        $this->session = \Config\Services::session();
        $this->modeloLogin = model('ModeloLogin');
    }

    public function index()
    {
        $this->session->destroy();
        return view('menus/login');
    }

    

    public function authenticate()
    {
        $noCuenta = $this->request->getPost('no_cuenta');
        $password = $this->request->getPost('password');
    
        // Verifica las credenciales en la base de datos
        $user = $this->modeloLogin->where('no_cuenta', $noCuenta)->first();
    
        if ($user && password_verify($password, $user['password_hash'])) {
            // Credenciales válidas, inicia sesión
            $this->session->set('user', $user);
            $this->session->set('nombre', $user['nombre']);
            $this->session->set('sexo', $user['sexo']);
            $this->session->set('fecha_nacimiento', $user['fecha_nacimiento']);
            $this->session->set('fecha_ingreso', $user['fecha_ingreso']);
            $this->session->set('codigo_postal', $user['codigo_postal']);
            $this->session->set('poblacion', $user['poblacion']);
            $this->session->set('localidad', $user['localidad']);
            $this->session->set('telefono', $user['telefono']);
            $this->session->set('afiliacion_imss', $user['afiliacion_imss']);
            $this->session->set('rol_id', $user['rol_id']);
            return redirect()->to('menuprincipal')->with('success', 'Inicio de sesión exitoso');
        } else {
            // Credenciales inválidas, muestra un mensaje de error
            $this->session->setFlashdata('error', 'Credenciales incorrectas');
            return redirect()->to('login');
        }
    }


}
