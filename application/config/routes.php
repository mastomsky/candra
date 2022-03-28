<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// landing
$route['home'] = 'landing/index';
$route['vehicles'] = 'landing/product_toyota';
$route['booking-service'] = 'landing/booking_service';
$route['promo-toyota'] = 'landing/promo_toyota';
$route['test-drive'] = 'landing/test_drive';
$route['konsultasi-pembelian'] = 'landing/konsultasi_pembelian';
$route['customer-gallery'] = 'landing/customer_gallery';
$route['price-list'] = 'landing/price_list';
$route['vehicle-spesification/(:any)'] = 'landing/detail_product/$1';

// Main Store 
$route['panel/admin'] = 'Auth/login';


$route['panel/logout'] = 'auth/logout';

$route['panel/dashboard'] = 'dashboard';
$route['panel/profile'] = 'dashboard/profile_data';
$route['panel/halaman'] = 'dashboard/setting';
$route['panel/halaman/process'] = 'dashboard/process';

$route['panel/banner/add'] = 'dashboard/banner_add';
$route['panel/banner/edit/(:num)'] = 'dashboard/banner_edit/$1';
$route['panel/banner/process'] = 'dashboard/banner_process';

$route['panel/promo/add'] = 'dashboard/promo_add';
$route['panel/promo/edit/(:num)'] = 'dashboard/promo_edit/$1';
$route['panel/promo/process'] = 'dashboard/promo_process';

$route['panel/user'] = 'panel/P_user/user_data';
$route['panel/user/add'] = 'panel/p_user/add';
$route['panel/user/edit/(:num)'] = 'panel/p_user/edit/$1';
$route['panel/user/del/(:num)'] = 'panel/p_user/del/$1';
$route['panel/user/process'] = 'panel/p_user/process';

$route['panel/portfolio'] = 'panel/Portfolio/portfolio_data';
$route['panel/portfolio/add'] = 'panel/Portfolio/add';
$route['panel/portfolio/edit/(:num)'] = 'panel/Portfolio/edit/$1';
$route['panel/portfolio/del/(:num)'] = 'panel/Portfolio/del/$1';
$route['panel/portfolio/process'] = 'panel/Portfolio/process';

$route['panel/category'] = 'panel/category/category_data';
$route['panel/category/add'] = 'panel/category/add';
$route['panel/category/edit/(:num)'] = 'panel/category/edit/$1';
$route['panel/category/del/(:num)'] = 'panel/category/del/$1';
$route['panel/category/process'] = 'panel/category/process';

$route['panel/vehicle-type/add'] = 'panel/category/add_type';
$route['panel/vehicle-type/edit/(:num)'] = 'panel/category/edit_type/$1';
$route['panel/vehicle-type/process'] = 'panel/category/process_type';
$route['panel/vehicle-type/del/(:num)'] = 'panel/category/del_type/$1';

$route['panel/vehicles'] = 'panel/O_vehicles';
$route['panel/vehicles/add'] = 'panel/O_vehicles/add';
$route['panel/vehicles/edit/(:num)'] = 'panel/O_vehicles/edit/$1';
$route['panel/vehicles/del/(:num)'] = 'panel/O_vehicles/del/$1';
$route['panel/vehicles/process'] = 'panel/O_vehicles/process';

$route['panel/vehicle-detail'] = 'panel/O_vehicles/vehicle_detail';
$route['panel/vehicle-detail/add'] = 'panel/O_vehicles/add_detail';
$route['panel/vehicle-detail/edit/(:num)'] = 'panel/O_vehicles/edit_detail/$1';
$route['panel/vehicle-detail/del/(:num)'] = 'panel/O_vehicles/del_detail/$1';
$route['panel/vehicle-detail/process'] = 'panel/O_vehicles/process_detail';
