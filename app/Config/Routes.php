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
$routes->get('/register', 'Register::index');
$routes->get('/login', 'Login::index');
$routes->post('/register/save','Register::save');
$routes->post('login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/catalog', 'Catalog::index');
$routes->get('/about', 'Home::about');
$routes->get('/map', 'Home::map');
$routes->get('/admin/products', 'Admin::products', ['filter' => 'auth']);
$routes->get('/admin/categories', 'Admin::categories', ['filter' => 'auth']);
$routes->get('/admin/add-product', 'Admin::addProduct', ['filter' => 'auth']);
$routes->get('/admin/add-category', 'Admin::addCategory', ['filter' => 'auth']);
$routes->post('/admin/save-product', 'Admin::saveProduct', ['filter' => 'auth']);
$routes->post('/admin/save-category', 'Admin::saveCategory', ['filter' => 'auth']);
$routes->post('/admin/create-category', 'Admin::createCategory', ['filter' => 'auth']);
$routes->post('/admin/create-product', 'Admin::createProduct', ['filter' => 'auth']);
$routes->get('admin/edit-product/(:num)', 'Admin::editProduct/$1', ['filter' => 'auth']);
$routes->get('admin/edit-category/(:num)', 'Admin::editCategory/$1', ['filter' => 'auth']);
$routes->get('admin/remove-category/(:num)', 'Admin::removeCategory/$1', ['filter' => 'auth']);
$routes->get('admin/remove-category/(:num)', 'Admin::removeCategory/$1', ['filter' => 'auth']);


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
