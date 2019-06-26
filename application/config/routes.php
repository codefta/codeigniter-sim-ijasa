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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Admin Routes */

/* Primary */
$route['admin'] = 'admin/dashboard';

/* Authentication */
$route['admin/login'] = 'admin/authentication/login';
$route['admin/logout'] = 'admin/authentication/logout';

/* Jenis Logistik */
$route['admin/jenis_logistik'] = 'admin/jenis_logistik';
$route['admin/jenis_logistik/add'] = 'admin/jenis_logistik/add_logistik';
$route['admin/jenis_logistik/save'] = 'admin/jenis_logistik/insert_logistik';
$route['admin/jenis_logistik/remove/(:num)'] = 'admin/jenis_logistik/delete_logistik/$1';
$route['admin/jenis_logistik/edit/(:num)'] = 'admin/jenis_logistik/edit_logistik/$1';
$route['admin/jenis_logistik/update'] = 'admin/jenis_logistik/update_logistik';

/* Info Bencana */
$route['admin/infobencana'] = 'admin/infobencana';
$route['admin/infobencana/add'] = 'admin/infobencana/add_infobencana';
$route['admin/infobencana/store'] = 'admin/infobencana/store_infobencana';
$route['admin/infobencana/destroy/(:num)'] = 'admin/infobencana/destroy_infobencana/$1';
$route['admin/infobencana/edit/(:num)'] = 'admin/infobencana/edit_infobencana/$1';
$route['admin/infobencana/lihat_kebutuhan/(:num)'] = 'admin/infobencana/kebutuhan_bencana/$1';
$route['admin/infobencana/lihat_korban/(:num)'] = 'admin/infobencana/korban_bencana/$1';

/* Validasi Logistik */
$route['admin/validasi_logistik'] = 'admin/validasi_logistik';
$route['admin/validasi_logistik/verif/(:num)'] = 'admin/validasi_logistik/validasi/$1';
$route['admin/validasi_logistik/show/(:num)'] = 'admin/validasi_logistik/show_validasi/$1';

/* My Profile */
$route['admin/profil'] = 'admin/profil';
$route['admin/profil/save'] = 'admin/profil/save_profil';

/* Users */
$route['admin/users'] = 'admin/users';
$route['admin/users/add'] = 'admin/users/add_users';
$route['admin/users/store'] = 'admin/users/store_users';
$route['admin/users/show/(:num)'] = 'admin/users/show_users/$1';
// $route['users/edit/(:num)'] = 'users/edit_users/$1';
$route['admin/users/save'] = 'admin/users/save_users';
$route['admin/users/destroy/(:num)'] = 'admin/users/destroy_users/$1';

/* Lokasi */
$route['api/provinsi'] = 'api/lokasi/daftar_provinsi';
$route['api/kota'] = 'api/lokasi/daftar_kota';
$route['api/kecamatan'] = 'api/lokasi/daftar_kecamatan';
$route['api/desa'] = 'api/lokasi/daftar_desa';
$route['api/logistik'] = 'api/jenis_logistik_api/nama_logistik';
$route['api/logistik/update'] = 'api/jenis_logistik_api/nama_logistik_update';

/* Statistik */
// Donatur
$route['admin/statistik/donatur'] = 'admin/statistik/donatur';
$route['admin/statistik/donasi'] = 'admin/statistik/donasi';
$route['admin/statistik/infobencana'] = 'admin/statistik/infobencana';
$route['admin/statistik/kebutuhan'] = 'admin/statistik/kebutuhan';

/* SPK */
$route['admin/spk'] = 'admin/spk/prioritas';


/* User Routes */

/* Authentication */
$route['login'] = 'user/authentication/index';
$route['login/in'] = 'user/authentication/login';
$route['register'] = 'user/authentication/register';
$route['register/store'] = 'user/authentication/store';
$route['logout'] = 'user/authentication/logout';


/* Info bencana */
$route['infobencana/detail/(:num)'] = 'user/infobencana/show/$1';

/* User Profile */
$route['profil'] = 'user/profil/show_profil';
$route['profil/save'] = 'user/profil/save_profil';
$route['profil/password'] = 'user/profil/change_password';
$route['profil/password/save'] = 'user/profil/save_password';

/* Donasi logistik */
$route['donasi/detail/(:num)'] = 'user/donasi_logistik/show/$1';
$route['donasi/add'] = 'user/donasi_logistik/create';
$route['donasi/status'] = 'user/donasi_logistik/status';


