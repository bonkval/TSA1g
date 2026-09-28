<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::welcome');
$routes->get('tasks', 'Pages::tasks');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');
