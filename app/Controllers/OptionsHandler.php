<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class OptionsHandler extends Controller
{
    public function index()
    {
        return $this->response->setStatusCode(200);
    }
}
