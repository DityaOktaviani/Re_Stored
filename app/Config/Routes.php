<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->post('home/add_mhs', 'Home::add_mhs');
$routes->get('home/get_mhs', 'Home::get_mhs');
$routes->post('home/view_mhs', 'Home::view_mhs');
$routes->post('home/edit_mhs', 'Home::edit_mhs');
$routes->post('home/delete_mhs', 'Home::delete_mhs');

//untuk data anggota semua ada di bawah ini

//mahasiswa
$routes->get('mhs/', 'DataAnggota::mhs');
$routes->post('mhs/add', 'DataAnggota::add');
$routes->get('mhs/get', 'DataAnggota::get_mhs');
$routes->post('mhs/view', 'DataAnggota::view');
$routes->post('mhs/edit', 'DataAnggota::edit');
$routes->post('mhs/delete', 'DataAnggota::delete');
$routes->post('mhs/search', 'DataAnggota::find_mhs');

//dosen
$routes->get('dosen/', 'DataAnggota::dosen');
$routes->post('dosen/add', 'DataAnggota::add');
$routes->post('dosen/view', 'DataAnggota::view');
$routes->post('dosen/edit', 'DataAnggota::edit');
$routes->post('dosen/delete', 'DataAnggota::delete');
$routes->get('dosen/get', 'DataAnggota::get_dosen');
$routes->post('dosen/search', 'DataAnggota::find_dosen');

//TU
$routes->get('tu/', 'DataAnggota::tu');
$routes->post('tu/add', 'DataAnggota::add');
$routes->post('tu/view', 'DataAnggota::view');
$routes->post('tu/edit', 'DataAnggota::edit');
$routes->post('tu/delete', 'DataAnggota::delete');
$routes->get('tu/get', 'DataAnggota::get_tu');
$routes->post('tu/search', 'DataAnggota::find_tu');

//book
$routes->get('book/','Book::index');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
