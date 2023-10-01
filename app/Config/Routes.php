<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 //users
$routes->get('/', 'ProductController::index');
//
$routes->get('product/getProductDetails/(:any)', 'ProductController::getProductDetails/$1');


//admins
$routes->get('/RegisterController/register', 'UserController::register');
$routes->post('/RegisterController/store', 'UserController::doRegister');

$routes->get('/SignController/Login', 'UserController::login');
$routes->post('/SigninController/LoginAuth', 'UserController::doLogin', ['filter' => 'authGuard']);



//insertion
$routes->get('admins/add_Prod', 'AdminsController::add_Prod');
$routes->post('admins/add_Prod/insertProduct', 'AdminsController::insertProduct');

//update
$routes->get('admins/edit_Prod/(:any)', 'AdminsController::edit_Prod/$1');
$routes->post('admins/add_Prod/updateProduct/(:any)', 'AdminsController::updateProduct/$1');

//deleteProduct
$routes->get('admins/delete_Prod/(:any)', 'AdminsController::delete_Prod/$1');
