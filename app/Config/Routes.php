<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::index');
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/reports', 'reports\ReportsController::index');
    $routes->get('/reports', 'reports\PieChartController::index');
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

    $routes->group('reports', function ($routes) {
        $routes->group('report', function ($routes) {
            $routes->get('getEntradas', 'reports\ReportsController::getEntradas');
            $routes->get('getSalidas', 'reports\ReportsController::getSalidas');
            $routes->get('initPieChart', 'reports\PieChartController::initPieChart');
            $routes->get('pdfView', 'reports\ReportsController::pdfView');
            $routes->post('makePDF', 'PdfController::makePDF');
        });
    });
});
