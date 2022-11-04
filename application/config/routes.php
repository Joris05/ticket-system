<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['checkUser'] = 'login';
$route['dashboard'] = 'dashboard';
$route['logout']    = 'dashboard/logout';
$route['create']    =  'ticket/create';
$route['tickets']   = 'ticket/list';
$route['ticket/store'] = 'ticket/store';
$route['ticket/view/(:any)'] = 'ticket/view/$1';
$route['ticket/status/(:any)/(:any)'] = 'ticket/status/$1/$2';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
