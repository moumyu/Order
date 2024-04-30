<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->match(['get', 'post'], 'SigninController/logout', 'SigninController::logout');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->get('/products/(:any)', 'ProductController::index/$1',['filter' => 'authGuard']);
$routes->get('/products', 'ProductController::index',['filter' => 'authGuard']);
$routes->get('/admin-products', 'AdminProductsController::index',['filter' => 'authGuard']);
$routes->get('/admin-add-product', 'AdminProductsController::addView',['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'AdminProductsController/add', 'AdminProductsController::add');
$routes->match(['get', 'post'], 'AdminProductsController/remove/(:any)', 'AdminProductsController::remove/$1');
