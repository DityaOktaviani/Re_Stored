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

//untuk data semua ada di bawah ini

//mahasiswa
$routes->group('mhs', function($routes){
	$routes->get('', 'Anggota::mhs');
	$routes->post('add', 'Anggota::add');
	$routes->get('get', 'Anggota::get_mhs');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->post('search', 'Anggota::find_mhs');
});

//dosen
$routes->group('dosen', function($routes){
	$routes->get('', 'Anggota::dosen');
	$routes->post('add', 'Anggota::add');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->get('get', 'Anggota::get_dosen');
	$routes->post('search', 'Anggota::find_dosen');
});

//TU
$routes->group('tu', function($routes){
	$routes->get('', 'Anggota::tu');
	$routes->post('add', 'Anggota::add');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->get('get', 'Anggota::get_tu');
	$routes->post('search', 'Anggota::find_tu');
});

//admin
$routes->group('admin', function($routes){
	//page
	$routes->get('', 'Admin::index');
	$routes->get('dataadmin', 'Admin::dataadmin');
	$routes->get('databuku', 'Admin::databuku');
	$routes->get('datadosen', 'Admin::datadosen');
	$routes->get('datamhs', 'Admin::datamhs');
	$routes->get('datatu', 'Admin::datatu');

	//ajax
	$routes->post('add', 'Admin::add');
	$routes->post('view', 'Admin::view');
	$routes->post('edit', 'Admin::edit');
	$routes->post('delete', 'Admin::delete');
	$routes->get('get', 'Admin::get');
	$routes->post('search', 'Admin::find');
});

//buku
$routes->group('buku', function($routes){
	$routes->get('', 'Buku::buku');
	$routes->post('add', 'Buku::add');
	$routes->post('view', 'Buku::view');
	$routes->add('edit', 'Buku::edit');
	$routes->post('delete', 'Buku::delete');
	$routes->get('get', 'Buku::get');
	$routes->post('search', 'Buku::find');
});
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
