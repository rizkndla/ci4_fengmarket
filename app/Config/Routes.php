<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ================= PUBLIC =================
$routes->get('/', 'Home::index');

// ================= USER MARKETPLACE =================
$routes->get('/products', 'ProductController::index');
$routes->get('/products/(:num)', 'ProductController::detail/$1');

// ================= ADMIN AUTH =================
$routes->get('/admin/login', 'Admin\AuthController::login');
$routes->post('/admin/login', 'Admin\AuthController::authenticate');
$routes->get('/admin/logout', 'Admin\AuthController::logout');

// ================= ADMIN AREA =================
$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {

    // ===== DASHBOARD =====
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // ===== PRODUCTS =====
    $routes->get('products', 'Admin\ProductController::index');
    $routes->get('products/create', 'Admin\ProductController::create');
    $routes->post('products/store', 'Admin\ProductController::store');
    $routes->get('products/edit/(:num)', 'Admin\ProductController::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\ProductController::update/$1');
    $routes->get('products/view/(:num)', 'Admin\ProductController::view/$1');
    $routes->post('products/delete/(:num)', 'Admin\ProductController::delete/$1');

    // ===== ORDERS (DUMMY) =====
    $routes->get('orders', 'Admin\OrderController::index');
    $routes->get('orders/view/(:num)', 'Admin\OrderController::view/$1');
    $routes->get('orders/edit/(:num)', 'Admin\OrderController::edit/$1');
    $routes->post('orders/update/(:num)', 'Admin\OrderController::update/$1');
    $routes->get('orders/print/(:num)', 'Admin\OrderController::print/$1');
    $routes->get('orders/export', 'Admin\OrderController::export');

});
