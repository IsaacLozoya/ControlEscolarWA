<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ApiAndroid extends BaseController
{
    protected $modeloLogin;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->modeloLogin = model('ModeloLogin');
    }

    public function authenticate()
    {
        log_message('info', 'Solicitud de autenticación recibida');
        // Obtener datos de la solicitud JSON
        $json = $this->request->getJSON();
        $noCuenta = $json->no_cuenta;
        $password = $json->password;

        // Verificar las credenciales en la base de datos
        $user = $this->modeloLogin->where('no_cuenta', $noCuenta)->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Credenciales válidas, inicia sesión
            $this->session->set('user', $user);
            // Otras asignaciones de datos a la sesión...

            // Construir y enviar la respuesta JSON
            $response = [
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'data' => [
                    'user' => $user,
                    // Otros datos que quieras incluir en la respuesta
                ],
            ];

            return $this->response->setJSON($response);
        } else {
            // Credenciales inválidas, construir y enviar la respuesta JSON
            $response = [
                'success' => false,
                'message' => 'Credenciales incorrectas',
            ];

            return $this->response->setJSON($response);
        }
    }
}
