<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'

]);

Route::get('/pages/{id}/show', 'PagesController@show')->name('pages.show');

Route::get('//pages/contacts', 'PagesController@contact')->name('pages.contacts');



Route::group(['middleware' => ['auth', 'admin']], function (){
    Route::resource('products', 'ProductsController');

    Route::get('/admin/products', 'AdminController@products')->name('admin.products');
    Route::get("/admin/create", 'AdminController@create')->name('admin.create');
    Route::get("/admin/{id}/edit", 'AdminController@edit')->name('admin.edit');
    Route::get("/admin/{id}/destroy", 'AdminController@destroy')->name('admin.destroy');
});




Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pages/home', 'HomeController@home')->name('pages.home');


Route::get('/cart/flush', 'CartController@flush')->name('cart.flush');

//Route::get('testas', 'ProductsController@index')->name('testas');

// Cart routes
Route::get('/cart/{id}/add', 'CartController@add')
    ->name('cart.add');

Route::get('/cart{id}/remove', 'CartController@remove')
    ->name('cart.remove');

Route::get('/cart', 'CartController@index')
    ->name('cart.index');
// end

// Order routes

Route::get('/order', 'OrderController@order')->name('order');

// forum routes

Route::get('/forum', 'ForumController@index')->name('forum');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'SlugController@getSingle'])->where('slug', '[\w\d\-\_]+');
//Route::get('blog/{slug}', 'SlugController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'SlugController@getIndex', 'as' => 'blog.index']);
//Route::get('blog', 'SlugController@getIndex')->name('blog.index');

Route::resource('posts', 'PostController');