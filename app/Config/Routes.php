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

$routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('/tasks/update/(:num)', 'TaskController::update/$1');

$routes->delete('/tasks/delete/(:num)', 'TaskController::delete/$1');

$routes->get('/tasks/completed_tasks', 'TaskController::completedtasks');
$routes->post('/tasks/complete/(:num)', 'TaskController::complete/$1');

$routes->get('/tasks/deleted_tasks', 'TaskController::deletedTasks');

$routes->delete('/tasks/delete_all', 'TaskController::deleteAllTasks');
$routes->delete('/tasks/delete_all_done', 'TaskController::deletecompleted');