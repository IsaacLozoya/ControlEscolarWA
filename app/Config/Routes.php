<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'ControladorLogin::index');
$routes->post('authenticate', 'ControladorLogin::authenticate');
$routes->get('menuprincipal', 'ControladorLogin::menu');



