<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['checkUser'] = 'login';
$route['dashboard'] = 'dashboard';
$route['logout']    = 'dashboard/logout';
$route['create']    =  'ticket/create';
$route['tickets/(:any)']   = 'ticket/list/$1';
$route['ticket/store'] = 'ticket/store';
$route['ticket/view/(:any)'] = 'ticket/view/$1';
$route['ticket/status/(:any)/(:any)'] = 'ticket/status/$1/$2';
$route['tickets/filter/(:any)/(:any)'] = 'ticket/filter/$1/$2';

$route['admin/dashboard']   = 'admin/index';
$route['admin/department']  = 'admin/department';
$route['admin/department/create'] = 'admin/createDepartment';
$route['admin/department/store'] = 'admin/storeDepartment';
$route['admin/edit/department/(:any)'] = 'admin/editDepartment/$1';
$route['admin/delete/department/(:any)'] = 'admin/deleteDepartment/$1';
$route['admin/department/update'] = 'admin/updateDepartment';

$route['admin/accounts']    = 'admin/accounts';
$route['admin/user/create'] = 'admin/createUser';
$route['admin/user/store'] = 'admin/storeUser';
$route['admin/delete/user/(:any)'] = 'admin/deleteUser/$1';
$route['admin/edit/user/(:any)'] = 'admin/editUser/$1';
$route['admin/user/update'] = 'admin/updateUser';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
