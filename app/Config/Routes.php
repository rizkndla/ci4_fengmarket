<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ================= PUBLIC =================
$routes->get('/', 'Home::index');
$routes->get('/halo', 'Home::halo');

// products (user side)
$routes->get('/products', 'ProductController::index');


// ================= ADMIN AUTH (TANPA FILTER) =================
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/login', 'Admin\AuthController::authenticate');
$routes->get('admin/logout', 'Admin\AuthController::logout');


// ================= ADMIN AREA (PAKAI FILTER) =================
$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {

    $routes->get('dashboard', 'Admin\DashboardController::index');

// products (admin side)
    $routes->get('products', 'Admin\ProductController::index');
    $routes->get('products/create', 'Admin\ProductController::create');
    $routes->post('products/store', 'Admin\ProductController::store');
});
