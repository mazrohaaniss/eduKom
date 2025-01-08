<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/loginAction', 'Auth::loginAction');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/registerAction', 'Auth::registerAction');
$routes->get('auth/lupapassword', 'Auth::lupapassword');

$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/user/dashboard', 'User::dashboard');
