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
        return view('menus/login');
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
            return view('menus/kardex');
        }else {
            return redirect()->to('login');
        }
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
            return redirect()->to('menuprincipal')->with('success', 'Inicio de sesión exitoso');
        } else {
            // Credenciales inválidas, muestra un mensaje de error
            $this->session->setFlashdata('error', 'Credenciales incorrectas');
            return redirect()->to('login');
        }
    }
    




}
