<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Pages::index');
$routes->get('pages/about', 'Pages::about');

//user
$routes->get('pages/login', 'Auth::index');
$routes->post('check', 'Auth::check');
//$routes->get('pages/register', 'Auth::register');
$routes->post('pages/register', 'Auth::create');
//$routes->get('pages/dashboard', 'Auth::dashboard');
//$routes->get('pages/profile', 'Auth::profile');
//$routes->get('pages/order', 'Auth::orders');
$routes->get('pages/logout', 'Auth::logout');

//admin
//$routes->get('pages/dashboard', 'Dashboard::index');
$routes->post('admin/register', 'Admin::create');
//$routes->get('admin/register', 'Admin::register');
//$routes->get('admin/index', 'Dashboard::index');
//$routes->get('admin/add-product', 'Dashboard::add_product');
// $routes->post('admin/add-product', 'Product::create');
// $routes->get('admin/edit-product/(:num)', 'Product::edited/$1');
// $routes->post('admin/edit-product/(:num)', 'Product::update/$1');
//$routes->get('admin/delete/(:num)', 'Product::delete/$1');
$routes->get('page/(:any)', 'Product::post/$1');
//$routes->get('admin/users', 'Dashboard::users');
//$routes->get('user-view/(:any)', 'Auth::post/$1');
//$routes->get('admin/user/(:num)', 'Auth::delete/$1');
$routes->get('admin/logout', 'Admin::logout');
//$routes->get('admin/products', 'Dashboard::products');
//$routes->get('admin/orders', 'Dashboard::orders');

$routes->get('admin/login', 'Admin::index');


$routes->post('/admin', 'Admin::check');



$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('pages/dashboard', 'Auth::dashboard');
    $routes->get('pages/profile', 'Auth::profile');
    $routes->get('pages/order', 'Auth::orders');

    // $routes->get('admin/index', 'Dashboard::index');
    // $routes->get('pages/dashboard', 'Dashboard::index');
    // $routes->get('admin/users', 'Dashboard::users');
    // $routes->get('admin/products', 'Dashboard::products');
    // $routes->get('admin/orders', 'Dashboard::orders');
});
$routes->group('', ['filter' => 'AdminAuthCheck'], function ($routes) {
    // $routes->get('pages/dashboard', 'Auth::dashboard');
    // $routes->get('pages/profile', 'Auth::profile');
    // $routes->get('pages/order', 'Auth::orders');

    $routes->get('admin/index', 'Dashboard::index');
    //$routes->get('pages/dashboard', 'Dashboard::index');
    $routes->get('admin/users', 'Dashboard::users');
    $routes->get('admin/products', 'Dashboard::products');
    $routes->get('admin/orders', 'Dashboard::orders');
    $routes->get('admin/add-product', 'Dashboard::add_product');
    $routes->get('user-view/(:any)', 'Auth::post/$1');
    $routes->get('admin/user/(:num)', 'Auth::delete/$1');
    $routes->get('admin/delete/(:num)', 'Product::delete/$1');
    $routes->post('admin/add-product', 'Product::create');
    $routes->get('admin/edit-product/(:num)', 'Product::edited/$1');
    $routes->post('admin/edit-product/(:num)', 'Product::update/$1');
});

// $routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
//     $routes->get('admin/login', 'Admin::index');
//     $routes->get('admin/register', 'Admin::register');

//     $routes->get('pages/login', 'Auth::index');
//     $routes->get('pages/register', 'Auth::register');
// });