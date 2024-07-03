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
