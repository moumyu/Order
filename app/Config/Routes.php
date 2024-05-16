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
$routes->get('/admin-orders', 'AdminOrdersController::index',['filter' => 'authGuard']);
$routes->get('/admin-add-product', 'AdminProductsController::addView',['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'AdminProductsController/add', 'AdminProductsController::add');
$routes->match(['get', 'post'], 'CartController/add', 'CartController::add');
$routes->match(['get', 'post'], 'CartController/cartAdd', 'CartController::cartAdd');
$routes->get('/carts', 'CartController::index',['filter' => 'authGuard']);
$routes->get('/checkout_success', 'OrderController::checkoutSuccess',['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'OrderController/add', 'OrderController::add');
$routes->match(['get', 'post'], 'AdminProductsController/remove/(:any)', 'AdminProductsController::remove/$1');
$routes->match(['get', 'post'], 'AdminOrdersController/finish/(:any)', 'AdminOrdersController::finish/$1');
