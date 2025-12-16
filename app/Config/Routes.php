<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/halo', 'Home::halo');

$routes->get('/products', 'ProductController::index');

//admin routes
$routes->group('admin', function($routes) {
    $routes->get('login', 'Admin\AuthController::login');
    $routes->post('login', 'Admin\AuthController::authenticate');
    $routes->get('logout', 'Admin\AuthController::logout');

    $routes->get('dashboard', 'Admin\DashboardController::index');
});
