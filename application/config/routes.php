<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller']    = 'Customer/beranda';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['beranda']               = 'Customer/beranda';
$route['contact']               = 'Customer/contact';
$route['mobil']                 = 'Customer/mobil';
$route['mobil/detailmobil/(:num)']  = 'Customer/detailmobil/$1';
$route['mobil/addrental/(:num)']    = 'Customer/addRental/$1';
$route['mobil/search']          = 'Customer/search';
$route['profil']                = 'Customer/profil';

$route['transaksi']                     = 'Customer/halamanTransaksi';
$route['transaksi/pembayaran/(:num)']   = 'Customer/halamanPembayaran/$1';
$route['transaksi/prosesPembayaran']    = 'Customer/prosesPembayaran';
$route['transaksi/review/(:num)']       = 'Customer/halamanReview/$1';

$route['admin/password']    = 'admin/user/ubah_password';
$route['admin/transaksi/customer']    = 'admin/transaksi/pilihCustomer';
$route['admin/transaksi/mobil/(:num)']       = 'admin/transaksi/pilihMobil/$1';
$route['admin/transaksi/tambah/(:num)/(:num)']       = 'admin/transaksi/addTransaksi/$1/$1';


$route['password/lupa']     = 'auth/lupa_password';
$route['password/reset']    = 'auth/check_token';
$route['password/ubah']     = 'auth/ubah_password';





// $route['customer/add'] = 'pelanggan/add';
// $route['customer/process'] = 'pelanggan/process';
// $route['customer/edit/(:num)'] = 'pelanggan/edit/$1';
// $route['customer/del/(:num)'] = 'pelanggan/del/$1';
