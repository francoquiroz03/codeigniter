<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['recovery'] = 'Login/recovery';
$route['email_recovery'] = 'Login/email_recovery';
$route['email'] = 'Login/email';
$route['recovery_password'] = 'Login/code';
$route['recovery_code'] = 'Login/recovery_code';
$route['password_change'] = 'Login/passwd_change';
$route['usuarios/agregar'] = 'controller_user/add';
$route['usuarios/editar'] = 'controller_user/edit';
$route['usuarios/editar/(:num)'] = 'controller_user/edit/$1';
$route['usuarios/eliminar'] = 'controller_user/remove';
$route['usuarios/eliminar/(:num)'] = 'controller_user/remove/$1';


$route['logout'] = 'home/logout';