<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerUser');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginUser');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'TaskController::index');

$routes->get('/tasks/create', 'TaskController::create');

$routes->post('/tasks/store', 'TaskController::store');