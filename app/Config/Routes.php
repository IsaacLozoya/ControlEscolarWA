<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //WEBAPP
 $routes->options('(:any)', 'OptionsHandler::index');


$routes->get('/', 'ControladorLogin::index');
$routes->get('login', 'ControladorLogin::index');
$routes->post('authenticate', 'ControladorLogin::authenticate');

$routes->get('menuprincipal', 'ControladorMenu::menu');
$routes->get('boletas/kardex', 'ControladorMenu::kardex');
$routes->get('boletas/visualkardex', 'ControladorMenu::vistakardex');
$routes->get('boletas/editkardex/(:num)', 'ControladorMenu::editkardex/$1');
$routes->put('boletas/visualkardex/(:num)', 'ControladorMenu::updatekardex/$1');

$routes->get('admin', 'ControladorAdmin::admin');
$routes->get('admin/createuser','ControladorAdmin::createuser');
$routes->post('admin', 'ControladorAdmin::newuser');
$routes->get('admin/showuser/(:num)', 'ControladorAdmin::showuser/$1');
$routes->get('admin/edituseralumno/(:num)', 'ControladorAdmin::edituseralumno/$1');
$routes->put('admin/(:num)', 'ControladorAdmin::update/$1');
$routes->delete('admin/(:num)', 'ControladorAdmin::delete/$1');

$routes->get('admin/edituserprofesor/(:num)', 'ControladorAdmin::edituserprofesor/$1');
$routes->put('admin/(:num)', 'ControladorAdmin::update/$1');

$routes->delete('admin/(:num)', 'ControladorAdmin::delete/$1');

$routes->get('justificantes', 'ControladorMenu::solicitudjustificante');

//ANDROIDAPP

$routes->group('api/android', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('authenticate', 'ApiAndroid::authenticate');
});



