<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::index');
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
});



$routes->group('api', function ($routes) {

    $routes->group('auth', function ($routes) {
        $routes->post('login', 'AuthController::login');
        $routes->post('logout' , 'AuthController::logout');
    });

    $routes->group('dashboard', function ($routes) {
        $routes->group('registro', function ($routes) {
            $routes->get('getRegistros', 'Dashboard\RegistroController::getRegistros');
            $routes->post('storeRegistro', 'Dashboard\RegistroController::storeRegistro');
        });
    });
});
