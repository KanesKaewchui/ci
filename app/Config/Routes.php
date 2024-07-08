<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');





$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->group('admin', function ($routes) {
    $routes->get('login', 'Admin::login');
    $routes->post('login', 'Admin::login');
    $routes->get('logout', 'Admin::logout');
    $routes->get('/', 'Admin::index', ['filter' => 'authGuard']);
    $routes->get('movies', 'Admin::movies', ['filter' => 'authGuard']);
    $routes->match(['get', 'post'], 'edit_movie/(:segment)', 'Admin::edit_movie/$1', ['filter' => 'authGuard']);
    $routes->get('delete_movie/(:segment)', 'Admin::delete_movie/$1', ['filter' => 'authGuard']);
    $routes->match(['get', 'post'], 'add_movie', 'Admin::add_movie', ['filter' => 'authGuard']);
});

$routes->group('marketplace', ['namespace' => 'App\Controllers\Marketplace'], function ($routes) {
    $routes->get('index', 'MarketplaceController::index');
    $routes->match(['get', 'post'], 'register', 'MarketplaceController::register');
    $routes->get('login', 'MarketplaceController::login');
    $routes->get('promotion', 'MarketplaceController::promotion');
    $routes->get('category', 'MarketplaceController::category');
    $routes->get('trending', 'MarketplaceController::trending');
    $routes->get('marketplace/itemdetails/(:num)', 'Marketplace\MarketplaceController::itemdetails/$1');
});
