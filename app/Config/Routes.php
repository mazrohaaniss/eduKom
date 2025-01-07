<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Auth::register');
$routes->post('/auth/save', 'Auth::save');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginCheck', 'Auth::loginCheck');
$routes->get('/logout', 'Auth::logout');

// Routes untuk dashboard berdasarkan role
$routes->get('/admin-dashboard', 'AdminController::index');
$routes->get('/user-dashboard', 'UserController::index');
