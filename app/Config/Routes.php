<?php

namespace Config;
use App\Controllers\AdminController;
use App\Controllers\NewsController;
use App\Controllers\UsersController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('logout', [UsersController::class, 'logout']);
$routes->get('login', [UsersController::class, 'login']);
$routes->post('login', [UsersController::class, 'login_post']);

$routes->get('register', [UsersController::class, 'registerView']);
$routes->post('register', [UsersController::class, 'register']);

$routes->get('panel', [UsersController::class, 'private_dashboard'], ['filter'=>'validateUsers']);
$routes->get('admin', [AdminController::class, 'index'], ['filter'=>'validateUsers']);

$routes->post('admin/cgroup', [AdminController::class, 'createRole']);
$routes->post('admin/setGroup', [AdminController::class, 'setRole']);

$routes->post('news/create', [NewsController::class, 'create']);
$routes->get('news/create', [NewsController::class, 'create']);

$routes->post('news/edit', [NewsController::class, 'edit']);
$routes->get('news/edit/(:num)', [NewsController::class, 'get/$1']);

$routes->get('news/delete/(:num)', [NewsController::class, 'delete/$1']);

$routes->post('contact', [NewsController::class, 'contact']);
$routes->get('contact', [NewsController::class, 'contactView']);


$routes->get('news/(:segment)', [NewsController::class, 'view']);
$routes->get('news', [NewsController::class, 'index']);

$routes->get('/(:segment)/(:segment)', [NewsController::class, 'index/$1/$2']);
$routes->get('/', [NewsController::class, 'index']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
