<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/alumno', 'Alumno::index');
$routes->get('/alumno/mostrar', 'Alumno::mostrar');
$routes->get('/alumno/agregar', 'Alumno::agregar');
$routes->get('/alumno/buscar', 'Alumno::buscar');
$routes->get('/alumno/editar/(:int)', 'Alumno::editar/$1');
$routes->get('/alumno/delete/(:int)','Alumno::delete/$1');

$routes->get('/carrera/agregar','Carrera::agregar');
$routes->post('/carrera/agregar','Carrera::agregar');


$routes->get('/usuario/login','UserController::index');
$routes->post('/usuario/login','UserController::index');

$routes->post('/alumno/insert', 'Alumno::insert');
$routes->post('/alumno/update', 'Alumno::update');
/*
$routes->get('/alumno/mostrar/(:int)/(:int)', 'Alumno::mostrar/$1/$2');
$routes->get('/alumno/subirimagen', 'Alumno::subirImagen');
$routes->post('/alumno/upload', 'Alumno::upload');

$routes->get('/carrera/mostrar', 'Carrera::mostrar');

$routes->get('/alumno/editar/(:any)', 'Alumno::editar/$1');

$routes->post('/alumno/insert', 'Alumno::insert');
$routes->post('/alumno/update/(:any)', 'Alumno::update/$1');

$routes->get('/css/*',"");
*/


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
