<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * (Original LavaLust Copyright Notice)
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
*/

// Home route: handles / or /1, /2, etc. (Pagination)
$router->get('/{page?}', 'UserController::show'); 

$router->get('/about', 'Welcome::about');
$router->get('/user/profile/{username}/{name}', 'UserController::profile');

// Explicit show route: handles /user/show or /user/show/1, /user/show/2, etc. (Pagination)
$router->get('/user/show/{page?}', 'UserController::show'); 

$router->match('/user/create', 'UserController::create', ['GET', 'POST']);
$router->match('/user/update/{id}', 'UserController::update', ['GET', 'POST']);

// ✅ FIX: Delete route must accept the optional page number for redirects
$router->get('/user/delete/{id}/{page?}', 'UserController::delete');

// ✅ FIX: Soft-delete route must accept the optional page number for redirects
$router->get('user/soft-delete/{id}/{page?}', 'UserController::soft_delete'); 

$router->get('/user/restore/{id}', 'UserController::restore');