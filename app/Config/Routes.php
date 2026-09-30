<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::welcome');
$routes->get('tasks', 'Pages::tasks');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');
$routes->get('login', 'Pages::login');
$routes->post('login', 'Pages::attemptLogin', ['filter' => 'csrf']);
$routes->post('logout', 'Pages::logout', ['filter' => 'csrf']);
$routes->get('tasks/new', 'Pages::newTask', ['filter' => 'auth']);
$routes->post('tasks', 'Pages::createTask', ['filter' => 'auth,csrf']);
$routes->get('tasks/(:num)/edit', 'Pages::editTask/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)', 'Pages::updateTask/$1', ['filter' => 'auth,csrf']);
$routes->post('tasks/(:num)/archive', 'Pages::archiveTask/$1', ['filter' => 'auth,csrf']);
