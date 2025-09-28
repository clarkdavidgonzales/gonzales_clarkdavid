<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
// ... (LavaLust Copyright Notice) ...

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
*/

$router->get('/{page?}', 'UserController::show'); 
$router->get('/about', 'Welcome::about');
$router->get('/user/profile/{username}/{name}', 'UserController::profile');
$router->get('/user/show/{page?}', 'UserController::show'); // Explicit show route
$router->match('/user/create', 'UserController::create', ['GET', 'POST']);
$router->match('/user/update/{id}', 'UserController::update', ['GET', 'POST']);

// ✅ FIX: Add optional page parameter for delete actions
$router->get('/user/delete/{id}/{page?}', 'UserController::delete');
$router->get('user/soft-delete/{id}/{page?}', 'UserController::soft_delete'); 

$router->get('/user/restore/{id}', 'UserController::restore');