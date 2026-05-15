<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginAction');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard/superadmin', 'Dashboard::superadmin');
$routes->get('/dashboard/bupati', 'Dashboard::bupati');
$routes->get('/dashboard', 'Dashboard::index');