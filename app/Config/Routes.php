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
	//page
	$routes->get('', 'Mhs::index');
	$routes->post('check', 'Anggota::check');
	$routes->get('mybook', 'Mhs::mybook');
	$routes->get('logout', 'Mhs::logout');

	//ajax
	$routes->get('', 'Anggota::mhs');
	$routes->post('check', 'Anggota::check');
	$routes->post('add', 'Anggota::add');
	$routes->get('get', 'Anggota::get_mhs');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->post('search', 'Anggota::find_mhs');
});

//dosen 100%
$routes->group('dosen', function($routes){
	//page
	$routes->get('', 'Dosen::index');
	$routes->post('check', 'Anggota::check');
	$routes->get('mybook', 'Dosen::mybook');
	$routes->get('logout', 'Dosen::logout');

	//ajax
	$routes->post('check', 'Anggota::check');
	$routes->post('add', 'Anggota::add');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->get('get', 'Anggota::get_dosen');
	$routes->post('search', 'Anggota::find_dosen');
});

//TU 100%
$routes->group('tu', function($routes){
	//page
	$routes->get('', 'Tu::index');
	$routes->post('check', 'Anggota::check');
	$routes->get('databuku', 'Tu::databuku');
	$routes->get('datadosen', 'Tu::datadosen');
	$routes->get('datamhs', 'Tu::datamhs');
	$routes->get('mybook', 'Tu::mybook');
	$routes->get('peminjaman', 'Tu::peminjaman');
	$routes->get('logout', 'Tu::logout');

	//ajax
	$routes->post('check', 'Anggota::check');
	$routes->post('add', 'Anggota::add');
	$routes->post('view', 'Anggota::view');
	$routes->post('edit', 'Anggota::edit');
	$routes->post('delete', 'Anggota::delete');
	$routes->get('get', 'Anggota::get_tu');
	$routes->post('search', 'Anggota::find_tu');
});

//admin 100%
$routes->group('admin', function($routes){
	//page
	$routes->get('', 'Admin::index');
	$routes->post('check', 'Anggota::check');
	$routes->get('dataadmin', 'Admin::dataadmin');
	$routes->get('databuku', 'Admin::databuku');
	$routes->get('datadosen', 'Admin::datadosen');
	$routes->get('datamhs', 'Admin::datamhs');
	$routes->get('datatu', 'Admin::datatu');
	$routes->get('peminjaman', 'Admin::peminjaman');
	$routes->get('logout', 'Admin::logout');

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
	$routes->post('edit', 'Buku::edit');
	$routes->post('delete', 'Buku::delete');
	$routes->get('get', 'Buku::get');
	$routes->get('get_r', 'Buku::get_r');
	$routes->get('get_owner', 'Buku::get_owner');
	$routes->post('search', 'Buku::find');
	$routes->post('search_r', 'Buku::find_r');
	$routes->post('search_owner', 'Buku::find_owner');
	$routes->get('newest', 'Buku::new_book');
	$routes->get('favorite', 'Buku::fav_book');
	$routes->post('acc', 'Buku::acc');
});

//peminjaman
$routes->group('peminjaman', function($routes){
	$routes->post('history', 'Peminjaman::history');
	$routes->post('pinjam', 'Peminjaman::pinjam');
	$routes->get('log', 'Peminjaman::log');
	$routes->post('log_search', 'Peminjaman::log_search');
});

//login
$routes->group('login', function($routes){
	$routes->get('', 'Login::index');
	$routes->get('branch', 'Login::branch');
	$routes->post('check', 'Login::check');
	$routes->post('activing', 'Login::activing');
	$routes->post('masuk', 'Login::masuk');
	//login admin
	$routes->group('admin', function($routes){
		$routes->get('', 'Login::admin');
		$routes->post('check', 'Login::admin_check');
		$routes->post('activing', 'Login::admin_activing');
		$routes->post('masuk', 'Login::admin_masuk');
		
	});
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
