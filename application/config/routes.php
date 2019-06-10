<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Authentication */
$route['login'] = 'authentication/login';
$route['logout'] = 'authentication/logout';

/* Jenis Logistik */
$route['jenis_logistik'] = 'jenis_logistik';
$route['jenis_logistik/add'] = 'jenis_logistik/add_logistik';
$route['jenis_logistik/save'] = 'jenis_logistik/insert_logistik';
$route['jenis_logistik/remove/(:num)'] = 'jenis_logistik/delete_logistik/$1';
$route['jenis_logistik/edit/(:num)'] = 'jenis_logistik/edit_logistik/$1';
$route['jenis_logistik/update'] = 'jenis_logistik/update_logistik';
$route['api/logistik'] = 'jenis_logistik/nama_logistik';

/* Info Bencana */
$route['infobencana'] = 'infobencana';
$route['infobencana/add'] = 'infobencana/add_infobencana';
$route['infobencana/store'] = 'infobencana/store_infobencana';
$route['infobencana/destroy/(:num)'] = 'infobencana/destroy_infobencana/$1';
$route['infobencana/edit/(:num)'] = 'infobencana/edit_infobencana/$1';

/* My Profile */
$route['profil'] = 'profil';
$route['profil/save'] = 'profil/save_profil';

/* Users */
$route['users'] = 'users';
$route['users/add'] = 'users/add_users';
$route['users/store'] = 'users/store_users';
$route['users/show/(:num)'] = 'users/show_users/$1';
// $route['users/edit/(:num)'] = 'users/edit_users/$1';
$route['users/save'] = 'users/save_users';
$route['users/destroy/(:num)'] = 'users/destroy_users/$1';

/* Lokasi */
$route['api/provinsi'] = 'lokasi/daftar_provinsi';
$route['api/kota'] = 'lokasi/daftar_kota';
$route['api/kecamatan'] = 'lokasi/daftar_kecamatan';
$route['api/desa'] = 'lokasi/daftar_desa';

