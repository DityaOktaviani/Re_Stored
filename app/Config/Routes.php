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

//untuk data semua ada di bawah ini

//mahasiswa
$routes->get('mhs/', 'Anggota::mhs');
$routes->post('mhs/add', 'Anggota::add');
$routes->get('mhs/get', 'Anggota::get_mhs');
$routes->post('mhs/view', 'Anggota::view');
$routes->post('mhs/edit', 'Anggota::edit');
$routes->post('mhs/delete', 'Anggota::delete');
$routes->post('mhs/search', 'Anggota::find_mhs');

//dosen
$routes->get('dosen/', 'Anggota::dosen');
$routes->post('dosen/add', 'Anggota::add');
$routes->post('dosen/view', 'Anggota::view');
$routes->post('dosen/edit', 'Anggota::edit');
$routes->post('dosen/delete', 'Anggota::delete');
$routes->get('dosen/get', 'Anggota::get_dosen');
$routes->post('dosen/search', 'Anggota::find_dosen');

//TU
$routes->get('tu/', 'Anggota::tu');
$routes->post('tu/add', 'Anggota::add');
$routes->post('tu/view', 'Anggota::view');
$routes->post('tu/edit', 'Anggota::edit');
$routes->post('tu/delete', 'Anggota::delete');
$routes->get('tu/get', 'Anggota::get_tu');
$routes->post('tu/search', 'Anggota::find_tu');

//admin
$routes->get('admin/', 'Admin::admin');
$routes->post('admin/add', 'Admin::add');
$routes->post('admin/view', 'Admin::view');
$routes->post('admin/edit', 'Admin::edit');
$routes->post('admin/delete', 'Admin::delete');
$routes->get('admin/get', 'Admin::get');
$routes->add('admin/search', 'Admin::find');

//buku
$routes->get('buku/', 'Buku::Buku');
$routes->post('buku/add', 'Buku::add');
$routes->post('buku/view', 'Buku::view');
$routes->post('buku/edit', 'Buku::edit');
$routes->post('buku/delete', 'Buku::delete');
$routes->get('buku/get', 'Buku::get');
$routes->add('buku/search', 'Buku::find');
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
