<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['checkUser'] = 'login';
$route['dashboard'] = 'dashboard';
$route['logout']    = 'dashboard/logout';
$route['create']    =  'ticket/create';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
