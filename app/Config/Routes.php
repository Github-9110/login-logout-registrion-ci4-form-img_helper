<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/alldata', 'Home::index');
$routes->get('/','LoginController::ajaxform');

$routes->get('/form', 'Home::form');
$routes->post('/savedata','Home::savedata');
$routes->get('edit/(:any)','Home::Edit/$1');
$routes->post('update/(:any)','Home::updatedata/$1');
$routes->get('remove/(:any)','Home::remove/$1'); 


$routes->get('login','LoginController::ajaxform');
$routes->get('userdata','LoginController::userdata');
$routes->post('logindata','LoginController::logindata'); 
$routes->get('logout','LoginController::logout');

