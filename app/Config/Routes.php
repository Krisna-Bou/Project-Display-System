<?php

namespace Config;

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
$routes->get('/', 'Home::index');

$routes->get('/project/(:num)', 'Post::view_post/$1');

$routes->get('/login', 'Login::index');
$routes->get('/login/forgot', 'Login::forgot_pass');

$routes->post('/login/check_login', 'Login::check_login');
$routes->get('/login/logout','Login::logout');

$routes->get('/register', 'Register::index');
$routes->post('/register/check_register', 'Register::check_register');

$routes->get('/project/create_project', 'Project::index');
$routes->post('/project/check_project', 'Project::check_project');

$routes->post('/login/forgot/check_secret', 'Login::check_secret');
$routes->get('/profile', 'Account::index');

$routes->get('/email', 'Email_Controller::index');
$routes->post('/email/verify', 'Email_Controller::verify');
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
