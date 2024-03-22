<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// CRUD Routes
$routes->get('/users-list', 'UserController::index');
$routes->post('/submit-form', 'UserController::store');
$routes->post('/update-form/(:num)', 'UserController::update/$1');
$routes->get('/delete/(:num)', 'UserController::delete/$1');