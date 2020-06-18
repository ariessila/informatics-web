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

$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

$route['adminpage'] = 'adminpage/home';
$route['dosenpage'] = 'dosenpage/home';
$route['login'] = 'auth/login';

$route['adminpage/halaman/manajemen-menu'] = 'adminpage/halaman/manajemen_menu';
$route['adminpage/halaman/reset-menu'] = 'adminpage/halaman/reset_menu';

$route['master-plan'] = 'MasterPlan';
$route['beranda'] = 'Home';

$route['news'] = 'Blogs';
$route['news/(:any)'] = 'Blogs/detail/$1';

$route['dosen/(:any)'] = 'Dosen/detail/$1';
$route['lectures/(:any)'] = 'Dosen/detail/$1';

$route['program-sarjana'] = 'Sarjana';
$route['program-magister'] = 'Sarjana/magister';
$route['program-doktor'] = 'Sarjana/doktor';
$route['bachelor-program'] = 'Sarjana';
$route['master-program'] = 'Sarjana/magister';
$route['doctoral-program'] = 'Sarjana/doktor';
$route['students'] = 'Mahasiswa';
$route['alumni'] = 'Mahasiswa/alumni';
$route['alumnus'] = 'Mahasiswa/alumni';

$route['overview'] = 'Ringkasan';
$route['organization'] = 'Organisasi';
$route['acreditation'] = 'Akreditasi';
$route['lectures'] = 'Dosen';
$route['publication'] = 'publikasi';
$route['research'] = 'Penelitian';
$route['cooperation'] = 'Kerjasama';
$route['staff-administrasi-dan-laboratorium'] = 'staff';
$route['administration-and-laboratory-staff'] = 'staff';

$route['berita'] = 'Blogs';
$route['berita/(:any)'] = 'Blogs/detail/$1';

$route['lab'] = 'Lab';
$route['lab/(:any)'] = 'Lab/detail/$1';

$route['akademik/(:any)'] = 'Akademik/index/$1';
$route['academic/(:any)'] = 'Akademik/index/$1';

$route['download'] = 'Download';

$route['information'] = 'Informasi';
$route['information/(:any)'] = 'Informasi/detail/$1';

$route['informasi'] = 'Informasi';
$route['informasi/(:any)'] = 'Informasi/detail/$1';

$route['lang/(:any)']['GET'] = 'home/switch_lang/$1';
$route['pages/(:any)'] = 'pages/view/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
