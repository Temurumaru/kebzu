<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('home');
});

Route::get('/services', function () {
	return view('services');
});

Route::get('/blogs', function () {
	return view('blogs');
});

Route::get('/blog', function () {
	return view('blog');
});

Route::get('/text_page', function () {
	return view('text_page');
}) -> name('text_page');

Route::get('/contact', function () {
	return view('contact');
});

Route::get('/about', function () {
	return view('about');
});

// Admin section

Route::get('/admin', function () {
	if(isset($_SESSION['admin'])) { 
		return view('admin');
	} else {
		return view('admin_signin');
	}
}) -> name('admin');

Route::post(
	'/sign_in_admin_c',
	'App\Http\Controllers\AdminController@signInAdmin'
) -> name('signInAdminC');

if(isset($_SESSION['admin'])) {

	Route::get('/admin_blog', function () {
		return view('admin_blog');
	}) -> name('admin_blog');

	Route::get('/admin_blog_upd', function () {
		return view('admin_blog_upd');
	}) -> name('admin_blog_upd');
	
	Route::get('/admin_text_page', function () {
		return view('admin_text_page');
	}) -> name('admin_text_page');

	Route::get('/admin_services', function () {
		return view('admin_services');
	}) -> name('admin_services');

	Route::get('/admin_upd_data', function () {
		return view('admin_upd_data');
	}) -> name('admin_upd_data');

	Route::get('/admin_upd_contact', function () {
		return view('admin_upd_contact');
	}) -> name('admin_upd_contact');

	Route::get('/admin_partner', function () {
		return view('admin_partner');
	}) -> name('admin_partner');

	Route::get('/admin_text_page_upd', function () {
		return view('admin_text_page_upd');
	}) -> name('admin_text_page_upd');


	Route::post(
		'/add_post_on_blog_c',
		'App\Http\Controllers\AdminController@addPostOnBlog'
	) -> name('addPostOnBlogC');

	Route::post(
		'/add_partner_c',
		'App\Http\Controllers\AdminController@addPartner'
	) -> name('addPartnerC');

	Route::post(
		'/upd_post_on_blog_c',
		'App\Http\Controllers\AdminController@updPostOnBlog'
	) -> name('updPostOnBlogC');

	Route::post(
		'/upd_post_on_services_c',
		'App\Http\Controllers\AdminController@updPostOnServices'
	) -> name('updPostOnServicesC');

	Route::post(
		'/upd_data_c',
		'App\Http\Controllers\AdminController@updData'
	) -> name('updDataC');

	Route::post(
		'/upd_contact_c',
		'App\Http\Controllers\AdminController@updContact'
	) -> name('updContactC');

	Route::post(
		'upd_home_wall_c',
		'App\Http\Controllers\AdminController@updHomeWall'
	) -> name('updHomeWallC');
	
	Route::post(
		'add_text_page',
		'App\Http\Controllers\AdminController@addTextPage'
	) -> name('addTextPageC');

	Route::post(
		'admin_text_page_upd_c',
		'App\Http\Controllers\AdminController@updTextPage'
	) -> name('updTextPageC');

	
	Route::delete(
		'del_post_blog_c',
		'App\Http\Controllers\AdminController@delPostBlog'
	) -> name('delPostBlogC');

	Route::delete(
		'del_partner_c',
		'App\Http\Controllers\AdminController@delPartner'
	) -> name('delPartnerC');

	Route::delete(
		'del_text_page',
		'App\Http\Controllers\AdminController@delTextPage'
	) -> name('delTextPageC');
	
	if($_SESSION['admin'] -> level >= 5) {
		Route::get('/admin_creator', function () {
			return view('admin_creator');
		}) -> name('admin_creator');

		Route::post(
			'/add_admin_c',
			'App\Http\Controllers\AdminController@addAdmin'
		) -> name('addAdminC');

		Route::delete(
			'/del_admin_c',
			'App\Http\Controllers\AdminController@delAdmin'
		) -> name('delAdminC');
	}
}